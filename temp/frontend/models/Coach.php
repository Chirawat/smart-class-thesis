<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "coach".
 *
 * @property integer $id
 * @property integer $courses_id
 * @property string $firstname
 * @property string $lastname
 * @property string $description
 * @property string $facebook
 * @property string $email
 * @property string $pic
 *
 * @property Courses $courses
 */
class Coach extends \yii\db\ActiveRecord
{
    public $pic_t;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coach';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['courses_id', 'firstname', 'lastname', 'description'], 'required'],
            [['courses_id'], 'integer'],
            [['description'], 'string'],
            [['firstname', 'lastname'], 'string', 'max' => 128],
            [['facebook', 'email', 'pic'], 'string', 'max' => 45],
            [['pic_t'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'courses_id' => 'รหัสห้องเรียน',
            'firstname' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'description' => 'คำอธิบาย',
            'facebook' => 'facebook',
            'email' => 'email',
            'pic' => 'Pic',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasOne(Courses::className(), ['id' => 'courses_id']);
    }
}
