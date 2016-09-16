<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ScaffoldingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scaffolding-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'problems_id') ?>

    <?= $form->field($model, 'scaff1') ?>

    <?= $form->field($model, 'scaff2') ?>

    <?= $form->field($model, 'scaff3') ?>

    <?= $form->field($model, 'scaff4') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
