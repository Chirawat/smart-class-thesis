<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sub_replies".
 *
 * @property integer $id
 * @property integer $replies_id
 * @property integer $user_id
 * @property string $date
 * @property string $content
 * @property string $file
 *
 * @property Replies $replies
 * @property User $user
 */
class SubReplies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_replies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['replies_id', 'user_id'], 'required'],
            [['replies_id', 'user_id'], 'integer'],
            [['date'], 'safe'],
            [['content'], 'string'],
            [['file'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'replies_id' => 'Replies ID',
            'user_id' => 'User ID',
            'date' => 'Date',
            'content' => 'Content',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReplies()
    {
        return $this->hasOne(Replies::className(), ['id' => 'replies_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
