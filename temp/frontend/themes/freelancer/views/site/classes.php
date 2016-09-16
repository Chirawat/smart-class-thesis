
<?php 
//use yii;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\Courses;
use frontend\models\Profile;
use frontend\models\Enrolment;
// teacher view
//$courses = Courses::find()->where(['created_by' => Yii::$app->user->identity->id])->all();

//$courses = $enrolments->courses;

$this->title = 'ห้องเรียนหลัก'; 
?>
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">


            <div class="form-group">
            <?php  if(Profile::findOne(Yii::$app->user->identity->id)->status == 'teacher'): ?>
                    <?= Html::a('<i class="fa fa-plus"></i> เพิ่ม/แก้ไข/ลบ ห้องเรียน', ['courses/index'], ['class' => 'btn btn-success']) ?>
            <?php else : ?>
                    <?= Html::a('<i class="fa fa-plus"></i> ลงทะเบียนเรียน', ['enrolment/create'], ['class' => 'btn btn-success']) ?>
            <?php endif; ?>
            </div>

            <!-- for debug on shared host -->
            <!-- <div><?="freelancer: " . Yii::getAlias('@freelancer')?></div> -->


            <?php // student view
            if(Profile::findOne(Yii::$app->user->identity->id)->status == 'student') : // Student view?>
            <div class="row">
                <?php $enrolments = Enrolment::find()->where(['user_id' =>Yii::$app->user->identity->id])->all();
                foreach($enrolments as $enrolment) : ?>
                <div class="col-sm-4 portfolio-item">
                    <a href=<?=Url::to(['site/classroom', 'courseID' => $enrolment->course->id])?> class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-arrow-right fa-3x"></i>
                                <h3><?=$enrolment->course->course_title?></h3>
                            </div>
                        </div>
                        <img src=<?="img/portfolio/" . $enrolment->course->icon?> class="img-responsive" alt="">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            <?php else: // teacher view?>
            <div class="row">
                <?php  $courses = Courses::find()->where(['created_by' => Yii::$app->user->identity->id, 'status' => "active"])->all();

                if(empty($courses)){
                    echo    '<div class="alert alert-info col-xs-6 col-xs-offset-3">
                                <p><i class="fa fa-warning"></i> คุณยังไม่ได้สร้างห้องเรียน กรุณาคลิกปุ่ม "เพิ่มห้องเรียน"</p>
                            </div>';
                }

                foreach($courses as $course) : ?>
                <div class="col-sm-4 portfolio-item">
                    <a href=<?=Url::to(['site/classroom', 'courseID' => $course->id])?> class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-arrow-right fa-3x"></i>
                                <h3><?=$course->course_title?></h3>
                            </div>
                        </div>
                        <img src=<?="img/portfolio/" . $course->icon?> class="img-responsive" alt="">
                    </a>
                </div>
                <?php endforeach; ?>
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