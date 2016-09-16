<?php

use yii\helpers\Html;
use frontend\models\Replies;


/* @var $this yii\web\View */
/* @var $model frontend\models\SubReplies */

$this->title = 'โพสตอบ';
$this->params['breadcrumbs'][] = ['label' => 'Sub Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-replies-create">
	<div class="col-lg-10 col-lg-offset-1">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    	$reply = Replies::findOne($model->replies_id);
    	echo "<p>$reply->content</p>";
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>

</div>
