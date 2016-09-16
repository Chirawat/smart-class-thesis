<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Courses */

$this->title = 'แก้ไขข้อมูลห้องเรียน: ' . ' ' . $model->course_title;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="courses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
