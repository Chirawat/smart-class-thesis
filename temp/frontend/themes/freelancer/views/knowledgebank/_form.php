<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model frontend\models\Knowledgebank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="knowledgebank-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'courses_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard'
    ])->label('เพิ่มเนื้อหา') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่มเนื้อหา' : 'แก้ไขเนื้อหา', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
