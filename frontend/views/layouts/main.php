<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use common\models\App;

$model=new App();


$data = $model->find()->where(['city'=>'ambegaon-taluka'])->one();

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
<?php $this->beginBody() ?>

<?php if(empty($data))
{?>
	<h2> Application not available  </2>

<?php
}
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <span class="logo">
	      <a class="navbar-brand" href="<?php echo Url::toRoute('site/index'); ?>"><span>Smart</span>Ambegaon Taluk</a>
	  </span>
	</div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
	   <li><a href="<?php echo Url::toRoute('site/index'); ?>">Home</a></li>
        <li><a href="<?php echo Url::toRoute('site/contact'); ?>">Contact Us</a></li>
        <li><a href="#"  data-toggle="modal" data-target="#myModal">Download Free App</a></li>
      </ul>
    </div>
  </div>
</nav>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
			  <img src="images/playstore.jpg" style="width: 150px" alt="smartnarayangoan app google playstore">
		  </h4>
        </div>
        <div class="modal-body">
          <p>This application is very much useful in daily life.It gives Bus time-
table,emergency numbers ,contact information of each and every enterprise,Special Offers local
commercial establishments, Home Services, all types of shops, Enterprises, Pvt Ltd companies ,
Tourism Attractions, and a whole lot of more information about the Ambegaon Taluk</p>
		  <a href="https://goo.gl/NvphMX">Click Here to Download</a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<div>
    <div class="container-full">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer>
			<div class="footer-top">
				<div class="container">
					<div class="foo-grids">
						<div class="col-md-6 footer-grid">
							<h4 class="footer-head">Who We Are</h4>
							<p><?= $data->about_us ?></p>
						</div>
						<!--<div class="col-md-3 footer-grid">
							<h4 class="footer-head">Information</h4>
							<ul>
								<li><a href="regions.html">Locations Map</a></li>	
								<li><a href="terms.html">Terms of Use</a></li>
								<li><a href="popular-search.html">Popular searches</a></li>	
								<li><a href="privacy.html">Privacy Policy</a></li>	
							</ul>
						</div>-->
						<div class="col-md-3 footer-grid">
							<h4 class="footer-head">Contact Us</h4>
							<address>	
								<ul class="location">
									<li><span class="glyphicon glyphicon-earphone"></span></li>
									<li>+91-<?= $data->mobile1 ?></li>
									<div class="clearfix"></div>
								</ul>	
								<ul class="location">
									<li><span class="glyphicon glyphicon-envelope"></span></li>
									<li><a href="mailto:<?= $data->email ?>"><?= $data->email ?></a></li>
									<div class="clearfix"></div>
								</ul>						
							</address>
						</div>
						<div class="clearfix"></div>
					</div>						
				</div>	
			</div>	
			<div class="footer-bottom text-center">
			<div class="container">
				<div class="footer-logo">
					<a href="<?php echo Url::toRoute('site/index'); ?>"><span>Smart</span>Ambegaon Taluka</a>
				</div>
				<div class="footer-social-icons">
					<ul>
						<li><a class="facebook" href="#"><span>Facebook</span></a></li>
						<li><a class="twitter" href="#"><span>Twitter</span></a></li>
						<li><a class="" href="#"><span>Instagram</span></a></li>
						<li><a class="googleplus" href="#"><span>Google+</span></a></li>
					</ul>
				</div>
				<div class="copyrights">
					<p> &copy; <?= date('Y') ?> Smart Ambegaon Taluk. All Rights Reserved | Design by  <a href="http://webonerds.com/"> Webonerds</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		</footer>

<?php $this->endBody() ?>
	<script>
				  $('textarea').blur(function () {
				$('#hire textarea').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('textarea + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('textarea + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:first-child input').blur(function () {
				$('#hire .field:first-child input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:first-child input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:first-child input + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:nth-child(2) input').blur(function () {
				$('#hire .field:nth-child(2) input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:nth-child(2) input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:nth-child(2) input + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:nth-child(3) input').blur(function () {
				$('#hire .field:nth-child(3) input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:nth-child(3) input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:nth-child(3) input + label + span').css({ 'opacity': 0 });
					}
				});
			});
			$('#hire .field:nth-child(4) input').blur(function () {
				$('#hire .field:nth-child(4) input').each(function () {
					$this = $(this);
					if (this.value != '') {
						$this.addClass('focused');
						$('.field:nth-child(4) input + label + span').css({ 'opacity': 1 });
					} else {
						$this.removeClass('focused');
						$('.field:nth-child(4) input + label + span').css({ 'opacity': 0 });
					}
				});
			});
		  //@ sourceURL=pen.js
		</script>
</body>
</html>
<?php $this->endPage() ?>
