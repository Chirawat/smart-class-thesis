<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "problems".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $created_date
 * @property string $duedate
 * @property string $files
 * @property integer $courses_id
 *
 * @property Courses $courses
 * @property Scaffolding $scaffolding
 * @property Turnins[] $turnins
 */
class Problems extends \yii\db\ActiveRecord
{
    public $files_t;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'problems';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'created_date', 'duedate', 'courses_id'], 'required'],
            [['description'], 'string'],
            [['created_date', 'duedate'], 'safe'],
            [['courses_id'], 'integer'],
            //[['title', 'files'], 'string', 'max' => 1024], 
            [['title'], 'string', 'max' => 1024], //update 20160122
            [['files_t'], 'file', 'maxFiles' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'หัวข้อสถานการณ์ปัญหา',
            'description' => 'คำอธิบาย',
            'created_date' => 'วันที่สร้างรายการ',
            'duedate' => 'วันกำหนดส่ง',
            'files' => 'ไฟล์แนบ',
            'courses_id' => 'Courses ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasOne(Courses::className(), ['id' => 'courses_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScaffolding()
    {
        return $this->hasOne(Scaffolding::className(), ['problems_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnins()
    {
        return $this->hasMany(Turnins::className(), ['problems_id' => 'id']);
    }
}
