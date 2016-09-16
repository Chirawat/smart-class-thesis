<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Knowledgebank */

$this->title = $model->courses_id;
$this->params['breadcrumbs'][] = ['label' => 'Knowledgebanks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knowledgebank-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->courses_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->courses_id], [
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
            'courses_id',
            'content:ntext',
        ],
    ]) ?>

</div>
