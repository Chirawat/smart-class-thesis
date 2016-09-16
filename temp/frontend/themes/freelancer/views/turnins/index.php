<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TurninsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Turnins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turnins-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Turnins', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'problems_id',
            'user_id',
            'answer:ntext',
            'files',
            // 'date',
            // 'score',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
