<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "topics".
 *
 * @property integer $id
 * @property integer $courses_id
 * @property string $topic
 * @property string $content
 * @property string $date
 * @property integer $user_id
 *
 * @property Replies[] $replies
 * @property Courses $courses
 * @property User $user
 */
class Topics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'topics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['courses_id', 'topic', 'content', 'date', 'user_id'], 'required'],
            [['courses_id', 'user_id'], 'integer'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['topic'], 'string', 'max' => 512]
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
            'topic' => 'หัวข้อ',
            'content' => 'รายละเอียด',
            'date' => 'วันที่โพส',
            'user_id' => 'รหัสผู้ใช้',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Replies::className(), ['topics_id' => 'id']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
