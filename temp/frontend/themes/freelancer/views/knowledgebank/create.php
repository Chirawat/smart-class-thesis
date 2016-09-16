<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $model frontend\models\Knowledgebank */

$this->title = 'เพิ่มเนื้อหาลงในธนาคารความรู้';
$this->params['breadcrumbs'][] = ['label' => 'ห้องเรียนหลัก', 'url' => ['site/classroom', 'courseID' => $model->courses_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knowledgebank-create">
	<div class="container">
		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?>
		<h1><?= Html::encode($this->title) ?></h1>

		<?= $this->render('_form', [
			'model' => $model,
		]) ?>
	</div>
</div>
