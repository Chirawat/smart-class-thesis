<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "replies".
 *
 * @property integer $id
 * @property integer $topics_id
 * @property string $content
 * @property string $date
 * @property integer $user_id
 * @property string $file
 *
 * @property Topics $topics
 * @property User $user
 */
class Replies extends \yii\db\ActiveRecord
{
    public $file_t;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'replies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topics_id', 'content', 'date', 'user_id'], 'required'],
            [['topics_id', 'user_id'], 'integer'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['file'], 'string', 'max' => 512],
            [['file_t'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topics_id' => 'รหัสหัวข้อโพส',
            'content' => 'เนื้อหา',
            'date' => 'วันที่โพส',
            'user_id' => 'รหัสผู้ใช้',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTopics()
    {
        return $this->hasOne(Topics::className(), ['id' => 'topics_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
