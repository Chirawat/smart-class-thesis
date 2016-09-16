<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TurninsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="turnins-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'problems_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'answer') ?>

    <?= $form->field($model, 'files') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'score') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
