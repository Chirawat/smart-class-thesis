<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CoachSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coaches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coach-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-home"></i> กลับหน้าห้องเรียนหลัก', ['site/classroom', 'courseID' => $course_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-plus"></i> เพิ่มข้อมูลโค้ช', ['create', 'course_id' => $course_id], ['class' => 'btn btn-success']) ?>
    </p>
    
    
    <table class="table table-hover">
        <tbody>
            <?php foreach($model as $coach): ?>
                <tr>
                    <div class="col-lg-2 col-lg-offset-2">
                        <br>
                        <?php $uploadPath = "upload/class_id_" . $coach->courses_id . "/coach_pic";  ?>
                        <img class="img-responsive img-circle" src="<?=$uploadPath . "/" . $coach->pic?>" alt="">
                    </div>
                
                    <div class="col-lg-6">
                        <h2><?=$coach->firstname . "  " . $coach->lastname ?></h2>

                        <p><b>คำแนะนำตัวโค้ช</b><br><?=$coach->description?>

                        <p>facebook: <b><?=$coach->facebook?></b></p>

                        <p>email: <b><?=$coach->email?></b></p>

                        <p>
                            <?= Html::a('<i class="fa fa-pencil"></i> แก้ไข', ['update', 'id' => $coach->id, 'courses_id' => $coach->courses_id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('<i class="fa fa-times"></i> ลบ', ['delete', 'id' => $coach->id, 'courses_id' => $coach->courses_id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>
                    </div>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
