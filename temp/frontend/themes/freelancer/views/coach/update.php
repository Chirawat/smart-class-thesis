<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Coach */

$this->title = 'Update Coach: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Coaches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'courses_id' => $model->courses_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coach-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
