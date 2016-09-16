<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property integer $id
 * @property string $course_title
 * @property string $created_date
 * @property integer $created_by
 * @property string $course_description
 * @property string $icon
 *
 * @property User $createdBy
 * @property Enrolment[] $enrolments
 * @property User[] $users
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_title', 'created_date', 'created_by'], 'required'],
            [['created_date'], 'safe'],
            [['created_by'], 'integer'],
            [['course_description'], 'string'],
            [['course_title'], 'string', 'max' => 255],
            [['icon'], 'string', 'max' => 128],
			[['status'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_title' => 'ชื่อห้องเรียน',
            'created_date' => 'วันที่สร้างห้องเรียน',
            'created_by' => 'สร้างโดย',
            'course_description' => 'คำอธิบายรายวิชา',
            'icon' => 'ไอคอน',
			'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnrolments()
    {
        return $this->hasMany(Enrolment::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('enrolment', ['course_id' => 'id']);
    }
}
