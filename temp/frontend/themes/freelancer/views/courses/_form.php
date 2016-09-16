<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model frontend\models\Courses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="courses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->hiddenInput(['value' => date('Y-m-d')])->label(false) ?>

    <?= $form->field($model, 'created_by')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false) ?>

    <?= $form->field($model, 'course_description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <?php 
        $availableBg = [
            'default_icon.png' =>'default_icon.png', 
            'cabin.png' => 'cabin.png', 
            'cake.png' => 'cake.png', 
            'circus.png' => 'circus.png', 
            'safe.png' => 'safe.png', 
            'submarine.png' => 'submarine.png'
        ];
    ?>

    <?= $form->field($model, 'icon')->dropDownList($availableBg)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
