<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model frontend\models\Knowledgebank */

// $this->title = 'แก้ไขเนื้อหาในธนาคารความรู้: ' . ' ' . $model->courses->course_title;
// $this->params['breadcrumbs'][] = ['label' => 'Knowledgebanks', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->courses_id, 'url' => ['view', 'id' => $model->courses_id]];
// $this->params['breadcrumbs'][] = 'Update';

$this->title = 'แก้ไขเนื้อหาในธนาคารความรู้: ' . ' ' . $model->courses->course_title;
$this->params['breadcrumbs'][] = ['label' => 'ห้องเรียนหลัก', 'url' => ['site/classroom', 'courseID' => $model->courses_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knowledgebank-update">
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
