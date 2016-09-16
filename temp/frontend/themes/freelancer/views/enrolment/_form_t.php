<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Profile;

/* @var $this yii\web\View */
/* @var $model frontend\models\Enrolment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enrolment-form">

	<table class="table table-hover">
		<?php foreach($courses as $course): ?>
  			<tr><td>
  				<div class="row">
					<div class="col-xs-4 portfolio-item">
						<br />
						<br />
	                    <img src=<?="img/portfolio/" . $course['icon']?> class="img-responsive" alt="">
	                </div>
	                <div class="col-xs-8">
		  				<h1><?=$course->course_title?></h1>
		  				<p><?=$course->course_description?></p>
		  				<?php $teacher = Profile::findOne($course->created_by); ?>
		  				<p>ผู้สอน <b><?=$teacher->firstname . "  " . $teacher->lastname?></b></p>
		  				<div class="form-group">
							<a href="<?=Url::to(['enrolment/create', 'course_id'=>$course->id])?>" class="btn btn-success">เข้าเรียน</a>
						</div>
					</div>
				</div>
			</td></tr>	
  		<?php endforeach; ?>
	</table>

</div>
