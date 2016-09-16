<?php

use yii\helpers\Html;
use frontend\models\Replies;
use frontend\models\Profile;
use frontend\models\Subreplies;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model frontend\models\Replies */

$this->title = $topicsModel->topic;
$this->params['breadcrumbs'][] = ['label' => 'Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="replies-create">
	<?php $topicCreator = Profile::findOne($topicsModel->user_id);?>
	
    <div class="container-fluid">
    	<div class="bs-example" data-example-id="default-media"> 
	    	<div class="media">
			    <div class="media-left"> 
			    	<br>
					<a> <img data-holder-rendered="true" src="<?="img/avatar/" . $topicCreator->avatar?>" style="width: 64px; height: 64px;" class="media-object" data-src="holder.js/64x64" alt="64x64"> </a> 
				</div> 

				<div class="media-body">
					<h1><?= Html::encode($this->title) ?></h1>

					<p class="text-muted">โดย <?=$topicCreator->firstname . " " . $topicCreator->lastname?> เมื่อ <?=$topicsModel->date?></p>

					<p><?=$topicsModel->content?></p>
				</div>
			</div>
    	</div>
    <hr>

    	<?php  $replies = Replies::find()->where(['topics_id' => $topicsModel->id])->all();
    	if(!empty($replies)): ?>
		<?php foreach($replies as $reply):?>
		<div class="col-lg-10 col-lg-offset-1">
    	<div class="well well-bg-primary">
			<div class="bs-example" data-example-id="default-media"> 
				<div class="media"> 
					<div class="media-left"> 
						<a> <img data-holder-rendered="true" src="<?="img/avatar/" . Profile::findOne($reply->user_id)->avatar?>" style="width: 64px; height: 64px;" class="media-object" data-src="holder.js/64x64" alt="64x64"> </a> 
					</div> 
					<div class="media-body"> 

						<?php $postBy = Profile::findOne($reply->user_id); ?>
						<h4 class="media-heading">
							<?=$postBy->firstname . " " . $postBy->lastname?>
						</h4>

						<p><?=$reply->content?></p>
						
						<?php
							if(!empty($reply->file)): 
								$uploadPath = "upload/class_id_" . $reply->topics->courses_id . "/topic_id_" . $reply->topics->id ; 
								$fileDir = $uploadPath . "/" . $reply->file;
								if(file_exists($fileDir)): ?>
									<div class="row">
										<div class="col-xs-6 col-md-3">
											<a href="#" class="thumbnail" data-toggle="modal" data-target="#myModal-<?=$reply->id?>">
												<img src=" <?=$fileDir ?>">
											</a>
										</div>
									</div>
									<!-- Modal -->
									<div class="modal fade" id="myModal-<?=$reply->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">ไฟล์แนบ</h4>
												</div>
												<div class="modal-body">
													<img src=" <?=$fileDir ?>">
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								<?php endif; ?>
							<?php endif; ?>

						<!-- reply of reply -->
						<?php $subComments = SubReplies::find()->where(['replies_id' => $reply->id])->all(); ?>
						<?php if(!empty($subComments)): ?>
							<?php foreach($subComments as $comment):?>
							<div class="media">

								<a class="media-left">
									<img data-holder-rendered="true" 
										src="<?="img/avatar/" . Profile::findOne($comment->user_id)->avatar?>" 
										style="width: 64px; height: 64px;" class="media-object" data-src="holder.js/64x64" alt="64x64">
								</a>

								<div class="media-body">
									<h4 class="media-heading">
										<?php 
											$person = Profile::findOne($comment->user_id);
											echo $person->firstname . " " . $person->lastname;
										?>
									</h4>
									<p> <?=$comment->content?></p>
								</div>
							</div>
							<?php endforeach; ?>
						<?php endif;?>
						<br>
						<span class="btn btn-primary"><i class="fa fa-reply"></i> <a href="<?=Url::to(['subreplies/create', 'reply_id' => $reply->id])?>">ตอบกลับ</a></span>
					</div> 
				</div>
    		</div>
		</div>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
	<div class="col-lg-10 col-lg-offset-1">
		<div class="container-fluid">
			<?php 
			$model->date = date('Y-m-d'); 
			$model->user_id = Yii::$app->user->identity->id;
			$model->topics_id = $topicsModel->id;
			?>
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
	    </div>
    </div>
</div>
</div>

