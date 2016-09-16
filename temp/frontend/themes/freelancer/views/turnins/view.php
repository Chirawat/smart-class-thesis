<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Turnins */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Turnins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turnins-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'problems_id' => $model->problems_id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'problems_id' => $model->problems_id, 'user_id' => $model->user_id], [
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
            'id',
            'problems_id',
            'user_id',
            'answer:ntext',
            'files',
            'date',
            'score',
        ],
    ]) ?>

</div>
