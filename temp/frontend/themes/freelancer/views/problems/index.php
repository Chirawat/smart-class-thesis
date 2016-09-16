<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProblemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Problems';
$this->params['breadcrumbs'][] = ['label' => 'ห้องเรียนหลัก', 'url' => ['site/classroom', 'courseID' => $course_id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">
	<?= Breadcrumbs::widget([
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	]) ?>
	<div class="problems-index">

		<h1><?= Html::encode($this->title) ?></h1>
		<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

		<p>
			<?= Html::a('Create Problems', ['create'], ['class' => 'btn btn-success']) ?>
		</p>

		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'columns' => [
				['class' => 'yii\grid\SerialColumn'],

				'id',
				'title',
				'description:ntext',
				'created_date',
				'duedate',
				// 'files',
				// 'courses_id',

				['class' => 'yii\grid\ActionColumn'],
			],
		]); ?>

	</div>
</div>
