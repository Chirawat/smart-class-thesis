<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $model frontend\models\Problems */

//$this->title = 'Create Problems';
$this->title = 'สร้างสถานการณ์ปัญหา';
$this->params['breadcrumbs'][] = ['label' => 'ห้องเรียนหลัก', 'url' => ['site/classroom', 'courseID' => $model->courses_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
	<?= Breadcrumbs::widget([
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	]) ?>
	<div class="problems-create">
		<h1><?= Html::encode($this->title) ?></h1>
		<?= $this->render('_form', [
			'model' => $model,
			'scaffoldingModel' => $scaffoldingModel,
		]) ?>
	</div>
</div>
