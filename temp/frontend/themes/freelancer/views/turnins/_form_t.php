<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use frontend\models\Problems;

/* @var $this yii\web\View */
/* @var $model frontend\models\Turnins */
/* @var $form yii\widgets\ActiveForm */

$problem = Problems::findOne($model->problems_id);


$scaffoldingPath = "upload/class_id_" . $problem->courses_id . "/problem_id_" . $problem->id . "/Scaffolding/" ; 

?>
<div>
    <hr>
    <h2><?=$problem->title?></h2>

    <p><?=$problem->description?></p>

    <div>
        <h2>ตัวช่วย</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#portfolioModal1">
            <i class="fa fa-bell"></i> ตัวช่วยด้านความคิดรวบยอด
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#portfolioModal2">
            <i class="fa fa-language"></i> ตัวช่วยด้านด้านการคิด
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#portfolioModal3">
            <i class="fa fa-random"></i> ตัวช่วยด้านกระบวนการ
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#portfolioModal4">
            <i class="fa fa-sort-numeric-asc"></i> ตัวช่วยด้านกลยุทธ์
        </button>
    </div>
    
</div>
<hr>
<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#currentTurnin" aria-controls="currentTurnin" role="tab" data-toggle="tab">ส่งงาน</a></li>
        
        <?php 
            $tabID = 1;
            foreach($turninsHistory as $turninHistory):?>
            <li role="presentation"><a href=<?="#turninHistoryId".$turninHistory->id?> aria-controls=<?="turninHistoryId".$turninHistory->id?> role="tab" data-toggle="tab">ส่งงานครั้งที่ <?=$tabID++?><br>(<?=$turninHistory->date?>)</a></li>
        <?php endforeach; ?>

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="currentTurnin">
            <div class="turnins-form">

                <?php $form = ActiveForm::begin([
                    'options'=>['enctype'=>'multipart/form-data'] // important
                ]);?>

                <?= $form->field($model, 'problems_id')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'answer')->widget(CKEditor::className(), [
                    'options' => ['rows' => 3],
                    'preset' => 'standard'
                ])->label(false) ?>

                <?= $form->field($model, 'files[]')->widget(FileInput::classname(), [
                            'options' => [
                                //'accept' => 'image/*',
                                'multiple' => true,
                            ],
                        ]);?>


                <?= $form->field($model, 'date')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'score')->hiddenInput()->label(false) ?>

                <div class="form-group">
                    <a href= <?=Url::to(['site/classroom', 'courseID' => $model->problems->courses_id])?> class="btn btn-success"><i class="fa fa-home"></i> กลับห้องเรียนหลัก</a>
                    <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-send"></i> ส่ง' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-danger' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <?php foreach($turninsHistory as $turninHistory):?>
            <div role="tabpanel" class="tab-pane" id=<?="turninHistoryId".$turninHistory->id?>>
                <div class="container-fluid">

                    <p><?=$turninHistory->answer?></p>

                    <p><i class="fa fa-file"></i> ไฟล์แนบ: <a href="upload/class_id_<?=$model->problems->courses_id?>/problem_id_<?=$problem->id?>/turnins/<?=$turninHistory->files?>"><?=$turninHistory->files?></a></p>
                    
                    <br>
                    <div class="form-group">
                        <a href= <?=Url::to(['site/classroom', 'courseID' => $model->problems->courses_id])?> class="btn btn-success"><i class="fa fa-home"></i> กลับห้องเรียนหลัก</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Scaffolding Modals -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>ตัวช่วยด้านความคิดรวยยอด</h2>
                        <hr class="star-primary">
                        <img src="<?=$scaffoldingPath . $scaffoldingModel->scaff1?>" class="img-responsive img-centered" alt="">
                        <!-- <img src="img/scaffolding/conceptual.png" class="img-responsive img-centered" alt=""> -->
                        <!-- <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p> -->
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scaffolding Modals -->
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>ตัวช่วยด้านด้านการคิด</h2>
                        <hr class="star-primary">
                        <img src="<?=$scaffoldingPath . $scaffoldingModel->scaff2?>" class="img-responsive img-centered" alt="">
                        <!-- <img src="img/scaffolding/metacognition.png" class="img-responsive img-centered" alt=""> -->
                        <!-- <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p> -->
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scaffolding Modals -->
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>ตัวช่วยด้านกระบวนการ</h2>
                        <hr class="star-primary">
                        <img src="<?=$scaffoldingPath . $scaffoldingModel->scaff3?>" class="img-responsive img-centered" alt="">
                        <!-- <img src="img/scaffolding/procedual.png" class="img-responsive img-centered" alt=""> -->
                        <!-- <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p> -->
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scaffolding Modals -->
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">
                        <h2>ตัวช่วยด้านกลยุทธ์</h2>
                        <hr class="star-primary">
                        <img src="<?=$scaffoldingPath . $scaffoldingModel->scaff4?>" class="img-responsive img-centered" alt="">
                        <!-- <img src="img/scaffolding/strategic.png" class="img-responsive img-centered" alt=""> -->
                        <!-- <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p> -->
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> ปิด</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>