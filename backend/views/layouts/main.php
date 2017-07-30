<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Smart Narayangaon</a>
            </div>
            <!-- /.navbar-header -->
            <?php
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                } else {
                    $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
                }
                echo Nav::widget([
                    'options' => ['class' => 'nav navbar-top-links navbar-right'],
                    'items' => $menuItems,
                ]);
            ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo Url::to(['site/index']); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['users/index']); ?>"><i class="fa fa-users fa-fw"></i> Users </a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['app/index']); ?>"><i class="fa fa-mobile fa-1x fa-fw"></i> Apps </a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['categories/index']); ?>"><i class="fa fa-sitemap fa-fw"></i> Categories</a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['vendor/index']); ?>"><i class="fa fa-shopping-cart fa-fw"></i> Vendors</a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['buses/index']); ?>"><i class="fa fa-bus fa-fw"></i> Buses </a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['sliders/index']); ?>"><i class="fa fa-picture-o fa-fw"></i> Sliders</a>
                        </li>
                        <li>
                            <a href="<?php echo Url::to(['advertisements/index']); ?>"><i class="fa fa-rss fa-fw"></i> Advertisements</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    <div id="page-wrapper">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
