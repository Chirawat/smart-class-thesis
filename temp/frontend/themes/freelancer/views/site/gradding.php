<?php 
use frontend\models\Profile;
use frontend\models\Courses;
use frontend\models\Turnins;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$problem_id = 1;

$this->title = 'สรุปคะแนน';
$this->params['breadcrumbs'][] = ['label' => 'ห้องเรียนหลัก', 'url' => ['site/classroom', 'courseID' => $course_id]];
$this->params['breadcrumbs'][] = $this->title;
?>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
	
        <div class="container">
			<div class="row">
				<div class="container">
					<?= Breadcrumbs::widget([
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					]) ?>
					<p>
						<h3>วิชา:  <?=Courses::find()->where(['id'=>$course_id])->one()->course_title?></h3>
					</p>
				</div>
			</div>
            <div class="row">
				<div class="container">
					<table class="table table-bordered">
						<tr>
							<td class="col-md-3" rowspan="2" align="center">ชื่อ-สกุล</td>
							<td colspan="<?=sizeof($problems)?>" align="center">งานที่ได้รับมอบหมาย</td>
						</tr>
						<tr>
							<?php foreach($problems as $problem): ?>
								<td width="82" align="center"><?=$problem_id++?></td>
							<?php endforeach; ?>
						</tr>
						<?php foreach($std_enroled as $std_enroled_t): 
							// Get student
							$profile = Profile::findOne($std_enroled_t->user_id)	// find by user id ?>
							<tr>
								<td class="text-left"><?= $profile->prefix . $profile->firstname . " " . $profile->lastname ?></td>
								<?php foreach($problems as $problem): 
									$turnin = Turnins::find()->where(['problems_id'=>$problem->id, 'user_id'=>$std_enroled_t->user_id])->one();?>
									<td class="text-center"><span class="label label-success"><?=$turnin['score']?></span></td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					</table>
				</div>
            </div>
	
			<br>
			<div class="row">
				<div class="container">
					<h3>รายละเอียดงาน</h3>
				</div>
			</div>
			<div class="row">
				<div class="container col-md-3">
				<table class="table table-bordered">
					<?php $problem_id = 1; ?>
					<?php foreach($problems as $problem): ?>
					<tr>
						<td class="col-md-1 text-center"><?=$problem_id++?></td>
						<td class="col-md-3"><?=$problem->title?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				</div>
			</div>
        </div>
    </section>