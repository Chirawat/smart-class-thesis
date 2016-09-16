<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model frontend\models\Coach */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coach-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options'=>['enctype'=>'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'courses_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard'
    ]) ?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic')->widget(FileInput::classname(), [
                'options' => [
                    //'accept' => 'image/*',
                    //'multiple' => true,
                ],
            ])->label('รูปโปรไฟล์');?>

    <div class="form-group">
        <div class="col-md-3 col-md-offset-3">
            <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-pencil"></i> เพิ่มข้อมูลโค้ช' : '<i class="fa fa-pencil"></i> แก้ไขข้อมูลโค้ช', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
