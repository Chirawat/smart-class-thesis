<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use frontend\models\Profile;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ห้องเรียนทั้งหมด';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> เพิ่มห้องเรียน', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-hover">
        <?php foreach($courses as $course): ?>
            <tr><td>
                <div class="row">
                    <div class="col-xs-4">
                            <br><br>
                            <img src=<?="img/portfolio/" . $course['icon']?> class="img-responsive" alt="">
                        
                    </div>
                    <div class="col-xs-8">
                        <h1><?=$course->course_title?></h1>
                        <p><?=$course->course_description?></p>
                        <?php $teacher = Profile::findOne($course->created_by); ?>
                        <hr>
                        <p>ผู้สอน: <b><?=$teacher->firstname . "  " . $teacher->lastname?></b></p>
                        <p>วันที่สร้างห้องเรียน: <b><?=$course->created_date?></p>
                        <div class="form-group">
                            <a href="<?=Url::to(['courses/update', 'id'=>$course->id])?>" class="btn btn-success">แก้ไข</a>
                            <a href="<?=Url::to(['courses/update', 'id'=>$course->id, 'param' => "deleted"])?>" class="btn btn-danger">ลบห้องเรียน</a>
                        </div>
                    </div>
                </div>
            </td></tr>  
        <?php endforeach; ?>
    </table>

</div>
