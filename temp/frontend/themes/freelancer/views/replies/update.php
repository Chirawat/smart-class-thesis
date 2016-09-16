<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Replies */

$this->title = 'Update Replies: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'topics_id' => $model->topics_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="replies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
