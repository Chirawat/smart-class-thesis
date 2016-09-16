<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model frontend\models\Problems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="problems-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]);?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard'
    ]) ?>

    <?= $form->field($model, 'created_date')->hiddenInput()->label(false)?>

    <?= $form->field($model, 'duedate')->widget(
                 DatePicker::className(), [
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);?>
    <!-- <div class="col-lg-4"> -->
    <?= $form->field($model, 'files[]')->widget(FileInput::classname(), [
                'options' => [
                    //'accept' => 'image/*',
                    'multiple' => true,
                ],
            ]);?>

    <?= $form->field($model, 'courses_id')->hiddenInput()->label(false) ?>

    <?= $form->field($scaffoldingModel, 'scaff1')->widget(FileInput::classname(), [
                'options' => [
                    //'accept' => 'image/*',
                    //'multiple' => true,
                ],
            ]);?>
    
    <?= $form->field($scaffoldingModel, 'scaff2')->widget(FileInput::classname(), [
                'options' => [
                    //'accept' => 'image/*',
                    //'multiple' => true,
                ],
            ]);?>

    <?= $form->field($scaffoldingModel, 'scaff3')->widget(FileInput::classname(), [
                'options' => [
                    //'accept' => 'image/*',
                    //'multiple' => true,
                ],
            ]);?>

    <?= $form->field($scaffoldingModel, 'scaff4')->widget(FileInput::classname(), [
                'options' => [
                    //'accept' => 'image/*',
                    //'multiple' => true,
                ],
            ]);?>     
    <!-- </div>        -->


    <div class="form-group">
        <?= Html::a('<i class="fa fa-home"></i> กลับหน้าห้องเรียนหลัก', ['site/classroom', 'courseID' => $model->courses_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton(
            $model->isNewRecord ? 
                '<i class="fa fa-plus"></i> เพิ่มสถานการณ์ปัญหา' : 
                '<i class="fa fa-pencil"></i> แก้ไขสถานการณ์ปัญหา', 
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
