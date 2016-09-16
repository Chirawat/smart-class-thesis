<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SubRepliesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sub Replies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-replies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sub Replies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'replies_id',
            'user_id',
            'date',
            'content:ntext',
            // 'file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
