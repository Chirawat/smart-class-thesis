<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Scaffolding */

$this->title = $model->problems_id;
$this->params['breadcrumbs'][] = ['label' => 'Scaffoldings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scaffolding-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->problems_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->problems_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'problems_id',
            'scaff1',
            'scaff2',
            'scaff3',
            'scaff4',
        ],
    ]) ?>

</div>
