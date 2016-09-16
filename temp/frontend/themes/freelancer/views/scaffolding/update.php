<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Scaffolding */

$this->title = 'Update Scaffolding: ' . ' ' . $model->problems_id;
$this->params['breadcrumbs'][] = ['label' => 'Scaffoldings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->problems_id, 'url' => ['view', 'id' => $model->problems_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scaffolding-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
