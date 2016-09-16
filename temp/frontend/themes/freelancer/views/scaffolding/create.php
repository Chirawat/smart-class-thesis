<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Scaffolding */

$this->title = 'Create Scaffolding';
$this->params['breadcrumbs'][] = ['label' => 'Scaffoldings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scaffolding-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
