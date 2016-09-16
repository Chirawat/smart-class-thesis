<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
// use frontend\assets\AppAsset;
use freelancer\assets\FreelancerAssets;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\helpers\BaseUrl;
use frontend\models\Profile;

FreelancerAssets::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=<?=Url::to(BaseUrl::home())?>>Smart Class</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#problemBase">PROBLEM BASE</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#knowledgeBank">KNOWLEDGE BANK</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#collaboration">COLLABORATION</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#coaching">COACHING</a>
                    </li>
                    <li class="page-scroll">
                        <a href=<?=Url::to(['/site/logout'])?> data-method="post"><?='Logout ('.Profile::findOne(Yii::$app->user->identity->id)->firstname.')'?></a>
                    </li> 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <?=$content?>

    <?php include '_footer.php'; ?>