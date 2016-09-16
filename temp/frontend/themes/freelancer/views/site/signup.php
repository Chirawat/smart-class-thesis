<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ลงทะเบียนผู้ใช้ใหม่';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>กรุณากรอกแบบฟอร์มด้านล่าง:</p>

    <div class="row">
        <div class="form-group">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'layout' => 'horizontal']); ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'prefix') ?>

                <?= $form->field($model, 'firstName') ?>

                <?= $form->field($model, 'lastName') ?>

                <?= $form->field($model, 'status')->dropDownList(['teacher'=>'ครู', 'student' => 'นักเรียน']) ?>

                <div class="form-group ">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-6">
                        <?= Html::submitButton('<i class="fa fa-check"></i> ลงทะเบียน', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
