<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Replies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="replies-form">

    
    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]);?>

    <?= $form->field($model, 'topics_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->label(false) ?>

    <?= $form->field($model, 'date')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                //'options' => [
                    //'accept' => 'image/*',
                    //'multiple' => true,
                //],
            ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-reply"></i> ตอบกระทู้' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
