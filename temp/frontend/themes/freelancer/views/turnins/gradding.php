<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use frontend\models\Profile;
use frontend\models\Turnins;
use yii\widgets\Breadcrumbs;

$this->title = 'ให้คะแนน';

$this->params['breadcrumbs'][] = ['label' => 'ห้องเรียนหลัก', 'url' => ['site/classroom', 'courseID' => $course_id]];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="container">
	<?= Breadcrumbs::widget([
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	]) ?>

	<div class="col-md-3">
		<div class="list-group">
			<?php 
			foreach($enrolmentModel as $enrolment) : 

				// get full name
				$student = Profile::findOne($enrolment->user_id);	
				
				// get turnin, depends on user_id and problem_id
				$turnin = Turnins::find()->where(['user_id' => $enrolment->user_id, 'problems_id' => $problem_id])->one();	// check turnin?
				if(!empty($turnin)): // turned in?>
					<a href="<?=Url::to(['turnins/gradding', 
											'problem_id' => $problem_id, 
											'user_id' => $student->user_id,
											])?>" class="list-group-item <?=$enrolment->user_id == $user_id?"active":null?>">
						<?=$student->prefix . $student->firstname . "  " . $student->lastname?>
					</a>
				<?php else: // did not turnin, disable?>
					<a style="color: #b4bcc2;" class="list-group-item"><?=$student->prefix . $student->firstname . "  " . $student->lastname?></a>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="col-md-9">

		<?php if(empty($model)): ?>

		<div class="alert alert-info">
			<p>กรุณาเลือกรายชื่อนักเรียนเพื่อตรวจงาน</p>
		</div>

		<?php else: ?>


			<div>
				<!-- tab headding -->
				<ul class="nav nav-tabs" role="tablist">
					<?php $tabID = 1;
					foreach($model as $turninHistory):?>
						<li role="presentation" <?=$tabID==1?'class="active"':null?>><a href=<?="#turninHistoryId".$turninHistory->id?> aria-controls=<?="turninHistoryId".$turninHistory->id?> role="tab" data-toggle="tab">ส่งงานครั้งที่ <?=$tabID++?><br>(<?=$turninHistory->date?>)</a></li>
					<?php endforeach; ?>
				</ul>

				<!-- tab content -->
				<div class="tab-content">
					<?php $tabID = 1;
					foreach($model as $turninHistory):?>

					<div role="tabpanel" class="tab-pane <?=$tabID==1?"active":null?>" id=<?="turninHistoryId".$turninHistory->id?>>
						<div class="container-fluid">
							<div class="row">            
								<p><?=$turninHistory->answer?></p>

								<?php 
								// usable tutorial: http://www.7blogger.com/7tip/php-save-file-name-in-thai-language.html
								$downloadPath = "upload/class_id_" . $turninHistory->problems->courses->id . "/problem_id_" . $turninHistory->problems_id . "/turnins/" . iconv("UTF-8", "windows-874", $turninHistory->files); ?>
								<!-- <p><i class="fa fa-file"></i> ไฟล์แนบ: <a href="<?=Url::to(['site/download', 'fileName' => $downloadPath])?>"><?=$turninHistory->files?></a></p> -->

								<p><i class="fa fa-file"></i> ไฟล์แนบ: <a href="<?=$downloadPath?>"><?=$turninHistory->files?></a></p>
							</div>
							<div class="row">
								<?php $form = ActiveForm::begin(); ?>
									<div class="row">
										<div class="col-xs-3">
											<?=$form->field($turninHistory, 'score')->textInput(['class' => 'form-control'])?>

											<?=$form->field($turninHistory, 'id')->hiddenInput()->label(false)?>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-2 form-group">
											<?=Html::submitButton('<i class="fa fa-pencil"></i> ให้คะแนน', ['class' => 'btn btn-success form-control'])?>
										</div>
									</div>
								<?php ActiveForm::end(); ?>
							</div>
						</div>
					</div>
					<?php $tabID++;
					endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>

