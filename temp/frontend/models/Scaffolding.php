<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "scaffolding".
 *
 * @property integer $problems_id
 * @property string $scaff1
 * @property string $scaff2
 * @property string $scaff3
 * @property string $scaff4
 *
 * @property Problems $problems
 */
class Scaffolding extends \yii\db\ActiveRecord
{
    public $scaff1_file;
    public $scaff2_file;
    public $scaff3_file;
    public $scaff4_file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scaffolding';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['problems_id'], 'required'],
            [['problems_id'], 'integer'],
            [['scaff1', 'scaff2', 'scaff3', 'scaff4'], 'string', 'max' => 128],
            [['scaff1_file', 'scaff2_file', 'scaff3_file', 'scaff4_file'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'problems_id' => 'Problems ID',
            'scaff1' => 'ตัวช่วยเหลือด้านความคิดรวบยอด',
            'scaff2' => 'ตัวช่วยเหลือด้านการคิด',
            'scaff3' => 'ตัวช่วยเหลือด้านกระบวนการ',
            'scaff4' => 'ตัวช่วยเหลือด้านกลยุทธ์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProblems()
    {
        return $this->hasOne(Problems::className(), ['id' => 'problems_id']);
    }
}
