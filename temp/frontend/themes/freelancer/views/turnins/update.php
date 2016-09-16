<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Turnins */

$this->title = 'Update Turnins: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Turnins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'problems_id' => $model->problems_id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
//var_dump($this->params['breadcrumbs']);
?>
<div class="turnins-update">

    <h1><?= Html::encode($this->title) ?></h1>
s
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
