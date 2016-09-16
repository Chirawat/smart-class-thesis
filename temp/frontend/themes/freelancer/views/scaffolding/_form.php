<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Scaffolding */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scaffolding-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'problems_id')->textInput() ?>

    <?= $form->field($model, 'scaff1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'scaff2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'scaff3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'scaff4')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
