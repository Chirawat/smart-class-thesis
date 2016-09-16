<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Problems;
use frontend\models\Knowledgebank;
use frontend\models\Topics;
use frontend\models\Replies;
use frontend\models\Coach;
use frontend\models\Profile;


$superUser = Profile::findOne(Yii::$app->user->identity->id)->status == 'teacher'? true : false;
?>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-4">
                            <img class="img-responsive" src="img/portfolio/<?=$model->icon?>" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="intro-text">
                            <span class="name"><?=$model->course_title?></span>
                            <hr class="star-light">

                            <?php 
                            $str = $model->course_description;
                            $spacePos = strpos($str, " ");
                            //var_dump($spacePos);
                            $spacePos = strpos($str, " ");
                            $limCourseDescription = mb_substr($str, 0, $spacePos-1, 'utf-8') . '<a style="color: #FFFFFF;" data-toggle="modal" data-target="#courseDescription"> (ดูเพิ่มเติม...)</a>'?>
                            <span class="skills"><p><?=$limCourseDescription?></p></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="problemBase">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>PROBLEM BASE</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="bs-example" data-example-id="hoverable-table">
                    <table class="table table-hover">
                        <?php if($superUser):?>
                        <p>
                            <?= Html::a('<i class="fa fa-plus"></i> เพิ่มสถานการณ์ปัญหา', ['problems/create', 'courseID' => $model->id], ['class' => 'btn btn-success']);?>
                            <?= Html::a('<i class="fa fa-list-ol"></i> สรุปคะแนน', ['site/gradding', 'course_id' => $model->id], ['class' => 'btn btn-success']);?>
                        </p>
                        <?php endif; ?>
                        <tbody>

                            <?php 
                            $problems = Problems::find()->where(['courses_id' => $model->id])->all();
                            if($problems == null){
                                echo '<div class="alert alert-warning"><i class="fa fa-warning"></i> ยังไม่มีสถานการณ์ปัญหา</div>';
                            }
                            $i = 0;
                            foreach($problems as $problem):?>
                            <tr>
                                <td>
                                    <div class="col-sm-4 portfolio-item">
                                    	<?php 
                                    	if($i++ < 3)
                                    		$imgStr = "loop";
                                    	else
                                    		$imgStr = "condition";
                                    	?>
                                        <img href="#" src="img/portfolio/<?=$imgStr?>.png" class="img-responsive img-centered" alt="">
                                    </div>
                                    <b class="problem-title"><?=$problem->title?>

                                        <?php if($superUser) : ?>
                                        <span class="pull-right">
                                            <?=Html::a('<i class="fa fa-pencil"></i> แก้ไข', ['problems/update', 'id' => $problem->id])?> | 
                                            <?=Html::a('<i class="fa fa-trash"></i> ลบ', ['problems/delete', 'id' => $problem->id], [
                                                'data' => [
                                                    'confirm' => 'Are you sure you want to delete this item?',
                                                    'method' => 'post',
                                                    ]
                                                ]);?>
                                        </span>
                                        <?php endif; ?>

                                    </b>

                                    <?php
                                    $MAX_LEN = 500;
                                    if(strlen($problem->description) >= $MAX_LEN ):
                                        $pos = strpos($problem->description, ' ', $MAX_LEN);
                                        $shortDescription = substr($problem->description, 0, $pos);
                                    else:
                                        $shortDescription = $problem->description;
                                    endif;
                                    ?>

                                    <p class="text-muted"><?=$shortDescription . "..."?></p>
                                    <div class="form-group">
                                    
                                        <!-- render duedate -->
                                        <?php if(strtotime($problem->duedate) < strtotime('now'))://late?> 
                                            <button class="btn btn-danger"><i class="fa fa-calendar"></i> กำหนดส่ง <?=$problem->duedate?> (ช้า)</button>
                                        <?php else: ?>
                                            <button class="btn btn-default"><i class="fa fa-calendar"></i> กำหนดส่ง <?=$problem->duedate?></button>
                                        <?php endif; ?>

                                        <!-- render check/turnin button -->
                                        <?php if(Profile::findOne(Yii::$app->user->identity->id)->status == 'teacher'): // teacher?>
                                            <a href=<?=Url::to(['turnins/gradding', 'problem_id' => $problem->id])?> class="btn btn-success"><i class="fa fa-send"></i> ตรวจงาน</a>
                                        <?php else: ?>
                                            <a href=<?=Url::to(['turnins/create', 'problem_id' => $problem->id])?> class="btn btn-success"><i class="fa fa-send"></i> ส่งงาน</a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="knowledgeBank">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>KNOWLEDGE BANK</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
				<div class="container">
					<p>
						<?php 
						$knowledgebank = Knowledgebank::findOne($model->id);
						if($knowledgebank == null){
							echo '<div class="alert alert-danger" role="alert"><i class="fa fa-warning"></i> ไม่มีข้อมูล</div>';
						}
						else{
							echo $knowledgebank->content;
						}
						?>
					</p>
                </div>
                <?php if($superUser): ?>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <?php 
                    if($knowledgebank == null){
                        echo Html::a('<i class="fa fa-download"></i> เพิ่มเนื้อหา', ['knowledgebank/create', 'courseID' => $model->id], ['class' => 'btn btn-lg btn-outline']);
                    }
                    elseif($superUser){
                        echo Html::a('<i class="fa fa-download"></i> แก้ไขเนื้อหา', ['knowledgebank/update' , 'courseID' => $model->id, 'id' => $knowledgebank->courses_id], ['class' => 'btn btn-lg btn-outline']);
                    }?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="collaboration">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>COLLABORATION</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <table class="table table-hover">
                        <!-- <thead> -->
                            <!-- <th><p>หัวข้อโพส</p></th> -->
                             <!-- <th class="col-md-1 text-centered"><p>ตอบกลับ</p></th> -->
                        <!-- </thead> -->
                        <tbody>

                            <?php
                            $topics = Topics::find()->where(['courses_id' => $model->id])->all();
                            foreach($topics as $topic):?>

                            <tr>
                                <td>
                                    <p><b><a href=<?=Url::to(['replies/create', 'topic_id' => $topic->id])?>><?=$topic->topic?></a></b></p>
                                    <?php $postedBy = Profile::findOne($topic->user->id) ?>
                                    <p class="text-muted">โดย <b><?=$postedBy->firstname . "  " . $postedBy->lastname?></b> เมื่อ <b><?=$topic->date?></b></p>
                                </td>
                                <td>
                                	<?php $countReply = Replies::find()->where(['topics_id' => $topic->id])->all();?>
                                    <p class="text-muted"><i class="fa fa-comment-o"></i> <?= sizeof($countReply) ?></p>
                                </td>
                            </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 style="border: 1px;" ">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <?php $topicsForm = ActiveForm::begin([
                            'action' => ['topics/create'],
                        ]); ?>
                    
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <?=$topicsForm->field($topicsModel, 'topic')->textInput(['class' => 'form-control', 'placeholder' => 'เพิ่มหัวข้อ'])?>                                
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <?=$topicsForm->field($topicsModel, 'content')->textArea(['class' => 'form-control', 'placeholder' => 'เพิ่มคำอธิบาย...', 'rows' => 6])?>                                
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">

                                <?=$topicsForm->field($topicsModel, 'courses_id')->hiddenInput(['value' => $model->id])->label(false)?>

                                <?=$topicsForm->field($topicsModel, 'date')->hiddenInput(['value' => date('Y-m-d')])->label(false)?>
                                
                                <?=$topicsForm->field($topicsModel, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false)?>

                                <?= Html::submitButton('ตั้งกระทู้', ['class' => 'btn btn-success btn-lg']) ?>
                            </div>
                        </div>
                    
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </section>
<!-- About Section -->
    <section class="success" id="coaching">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>COACHING</h2>
                    <hr class="star-light">
                </div>
            </div>

            <?php 
            $coachs = Coach::find()->where(['courses_id' => $model->id])->all();
            foreach($coachs as $coach):
            ?>

            <div class="row">
                <div class="col-lg-2 col-lg-offset-2">
                    <br>
                    <?php $uploadPath = "upload/class_id_" . $model->id . "/coach_pic";  ?>
                    <img class="img-responsive img-circle" src="<?=$uploadPath . "/" . $coach->pic?>" alt="">
                </div>
                <div class="col-lg-6">
                    <h1><?=$coach->firstname . "  " . $coach->lastname?></h1>
                    <p><?=$coach->description?></p>
                    <ul class="list-inline">
                        <li>
                            <a href=<?=$coach->facebook?> class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href=<?="mailto:".$coach->email?> class="btn-social btn-outline"><i class="fa fa-fw fa-envelope"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>

            <?php endforeach; ?>

            <?php if($superUser) : ?>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <?=Html::a('<i class="fa fa-gear"></i> แก้ไขข้อมูลโค้ช', ['coach/index', 'course_id' => $model->id], ['class' => 'btn btn-lg btn-outline']);?>
                </div>
            <?php endif; ?>

        </div>
    </section>
    

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
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
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/cabin.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/cake.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/circus.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/game.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/safe.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/submarine.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="courseDescription" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <div class="modal-body" class="text-left">
                            <h2>คำอธิบายรายวิชา</h2>
                            <hr class="star-primary">
                            <div class="text-left"><p><?=$str?></p></div>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>