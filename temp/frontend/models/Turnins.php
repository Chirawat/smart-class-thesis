<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "turnins".
 *
 * @property integer $id
 * @property integer $problems_id
 * @property integer $user_id
 * @property string $answer
 * @property string $files
 * @property string $date
 * @property integer $score
 *
 * @property Problems $problems
 * @property User $user
 */
class Turnins extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $files_t;

    public static function tableName()
    {
        return 'turnins';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['problems_id', 'user_id', 'answer', 'date'], 'required'],
            [['problems_id', 'user_id', 'score'], 'integer'],
            [['answer'], 'string'],
            [['date'], 'safe'],
            [['files'], 'string', 'max' => 1024],
            [['files_t'], 'file', 'maxFiles' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'problems_id' => 'สถานการณ์ปัญหา',
            'user_id' => 'ผู้ใช้',
            'answer' => 'คำตอบ',
            'files' => 'ไฟล์แนบ',
            'date' => 'วันที่ส่ง',
            'score' => 'คะแนน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProblems()
    {
        return $this->hasOne(Problems::className(), ['id' => 'problems_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
