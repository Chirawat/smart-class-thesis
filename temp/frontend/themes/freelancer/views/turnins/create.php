<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Turnins */

$this->title = 'ส่งงาน';
$this->params['breadcrumbs'][] = ['label' => 'Turnins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turnins-create">

    <div class="col-lg-10 col-lg-offset-1">
    	<h1><?= Html::encode($this->title) ?></h1>
	    <?= $this->render('_form_t', [
	        'model' => $model,
	        'turninsHistory' => $turninsHistory,
	        'scaffoldingModel'=> $scaffoldingModel,
	    ]) ?>
    </div>

</div>
