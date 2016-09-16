<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "knowledgebank".
 *
 * @property integer $courses_id
 * @property string $content
 *
 * @property Courses $courses
 */
class Knowledgebank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'knowledgebank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['courses_id', 'content'], 'required'],
            [['courses_id'], 'integer'],
            [['content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'courses_id' => 'Courses ID',
            'content' => 'Content',
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
