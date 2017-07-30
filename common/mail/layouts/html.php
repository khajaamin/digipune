<?php
use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <style type="text/css">    	
	body{
		width: 100%; 
		background-color: #fff; 
		margin:0; 
		padding:0; 
		-webkit-font-smoothing: antialiased;
	}
	html{
		width: 100%; 
	}
	table{
		font-size: 14px;
		border: 0;
	}
	/* ----------- Response ----------- */
	@media only screen and (max-width:1080px){
		.banner-top {
			height: 100px;
		}
	}
	@media only screen and (max-width:800px){
		.services-mdl {
			width: 80%;
		}
	}
	@media only screen and (max-width:786px){
		.banner-top {
			height: 90px;
		}
		.services-mdl {
			width: 90%;
		}
	}
	@media only screen and (max-width:667px){
		.full {
			width: 640px;
		}
		.container {
			width: 640px;
		}
	}
	@media only screen and (max-width:640px){
		.container {
			width: 500px;
		}
		.full {
			width: 540px;
		}
		.services-text {
			width: 240px;
		}
		td.scale-top {
			height: 30px;
		}
		td.services-text-scale {
			height: 0px;
		}
		.slid {
			height: 200px;
		}
		.slid-title {
			font-size: 20px !important;
		}
		.scale {
			width: 560px;
		}
		.blog-grids {
			width: 260px;
		}
		.social {
			float: left;
		}
	}
	@media only screen and (max-width:600px){
		.banner-top {
			height: 70px;
		}
		.bnr-title {
			font-size: 2.5em !important;
		}
		table {
			font-size: 13px;
		}
		.container {
			width: 460px;
		}
		.team {
			width: 540px;
		}
		.team-grids {
			width: 165px;
		}
		table.team-scale {
			width: 351px;
		}
		.scale {
			width: 540px;
		}
	}
	@media only screen and (max-width:480px){
		.container {
			width: 415px;
		}
		.team {
			width: 410px;
		}
		.team-grids {
			width: 130px;
		}
		table.team-scale {
			width: 270px;
		}
		.team-text {
			font-size: 14px !important;
		}
		.full,.scale {
			width: 425px;
		}
		.services-img {
			width: 200px;
		}
		.services-text {
			width: 210px;
		}
		.blog-grids {
			width: 200px;
		}
		.footer-scale {
			height: 25px;
		}
		.footer.container {
			text-align: center;
		}
		.social {
			float: none;
			margin: 0 auto;
		}
		.footer-left {
			width: 100%;
		}
	}
	@media only screen and (max-width:414px){
		.container {
			width: 360px;
		}
		.logo a {
			font-size: 2.5em !important;
		}
		.banner-top {
			height: 50px;
		}
		.bnr-text {
			letter-spacing: 1px !important;
			font-size: 12px !important;
		}
		.scale-center-both {
			font-size: 13px;
		}
		.scale-center-both.about-text {
			padding: 15px 0px 35px 0px !important;
		}
		.buy {
			font-size: 12px !important;
			padding: 10px 20px !important;
		}
		.full, .scale {
			width: 320px;
		}
		.blog-grids {
			width: 190px;
		}
		.slid-title {
			font-size: 17px !important;
		}
		.slid td {
			font-size: 1.3em !important;
		}
		.slid {
			height: 175px;
		}
		.team {
		<!-- w3layouts -->
		width: 250px;
		}
		.team-grids {
			width: 210px;
			float: none;
			margin: 0 auto;
			text-align: center;
		}
		.team-text {
			font-size: 13px !important;
		}
		.services-img {
			width: 200px;
			float: none !important;
		}
		.services-text {
			width: 90%;
			float: none !important;
		}
		.logo {
			float: none;
			text-align: center !important;
			width: 100%;
		}
		.top-nav {
			float: none;
		}
		.bnr-title {
			font-size: 2.2em !important;
		}
		.footer-logo {
			width: 100%;
		}
		.blog-grids {
			width: 157px;
		}
		.blog-grids a {
			padding: .6em 1.2em !important;
		}
		.scale-center {
			font-size: .9em !important;
		}
		.banner a {
			padding: .8em 1.5em !important;
		}	
	}
	@media only screen and (max-width:375px){
		.container {
			width: 325px;
		<!-- agileits -->
			}
		.banner-top {
			height: 40px;
		}
	}
	@media only screen and (max-width:320px){
		.container {
			width: 300px;
		}
		.full, .scale {
			width: 250px;
		}
		.services-img {
			width: 235px;
		}
		.services-text {
			width: 100%;
		}
		.slid td {
			font-size: 1.1em !important;
		}
		.slid {
			height: 125px;
		}
		td.scale-top {
			height: 15px;
		}
		.title {
			font-size: 2.5em !important;
		}
		.title-scale {
			height: 20px;
		}
		.team-grids {
			width: 200px;
		}
		.blog-grids {
			width: 100%;
			float: none;
			margin-bottom: 1em;
		}
		.bnr-title {
			font-size: 1.8em !important;
		}
		.bnr-text {
			letter-spacing: 0px !important;
		}
		.container {
			width: 280px;
		<!-- w3layouts -->
			}
		.banner-top {
			height: 34px;
		}
		.top-nav .scale-center-both {
			height: 35px;
		}
		.about .scale-center-both font {
			font-size: 19px !important;
		}
		.scale-center-both.about-text {
			padding: 10px 0px 20px 0px !important;
		}
		.top-nav {
			width: 96%;
		}
	}
</style>
    <?php $this->head() ?>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
	
    <table border="0" width="100%" cellpadding="0" cellspacing="0">
		<tr>
            <td width="100%" align="center" valign="top">
				<!-- header -->
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td height="20" style="background-color: #1D1D1D;">&nbsp;</td>
						</tr>
						<tr>
							<td height="50" style="background-color: #1D1D1D;">
								<table align="center" border="0" cellpadding="0" cellspacing="0" class="container" width="620">
									<tbody>
										<tr>
											<td>
												<!--logo -->
												<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="logo">
													<tr>
														<td align="center">
															<a href="http://www.smartnarayangaon.com" style="font-size:3em;color: #fff;text-decoration:none;
																text-align: center;
																font-family:Maiandra GD,serif;">Smart Narayangaon</a>
														</td>
													</tr>
												</table>
												<!--navigation-->
															
												
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td height="20" style="background-color: #1D1D1D;">&nbsp;</td>
						</tr>
					</tbody>
				</table>
				<!-- banner -->
				<table class="banner" align="center" border="0" cellpadding="0" cellspacing="0" style="-webkit-background-size: auto; background-size: auto; background-position: center top; background-repeat: no-repeat no-repeat; background-size: cover; background-image: url(http://www.smartnarayangaon.com/images/banner.jpg);" width="100%">
					<tbody>
						<tr>
							<td>
								<table align="center" border="0" cellpadding="0" cellspacing="0" class="container" width="620">
									<tbody>
										<tr>
											<td height="120" class="banner-top">&nbsp;</td>
										</tr>
										<tr>
											<td class="bnr-title" align="center" style="font-family: Maiandra GD,serif; font-size: 3em; color: rgb(255, 255, 255); text-align: center;">
												WE ARE FOR YOU
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- banner-bottom -->
				<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" class="about">
					<tbody>
						<tr>
							<td>
								<table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family: Helvetica, Arial, sans-serif; font-size: 15px; color: #9b9b9b;" class="container">
									<tbody>
										<tr><td height="70" class="scale-top"></td></tr>
										<tr>
											<td align="center" class="scale-center-both">
												<font style="font-family: Helvetica, Arial, sans-serif; font-size: 24px; color: #242424;"><singleline>Welcome To Smart Narayangaon</singleline></font>
											</td>
										</tr>
										<tr>
											<td style="padding: 15px 0px 54px 0px; line-height:1.8em; color: #242424 !important;" class="scale-center-both about-text">
											<?php $this->beginBody() ?>
										    <?= $content ?>
										    <?php $this->endBody() ?>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>								
							<!--slid-two-->
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td class="slid" height="250" style="background-color: #3BB9EB;">
								<table align="center" border="0" cellpadding="0" cellspacing="0" class="slid-info" width="100%">
									<tbody>
										<tr>
											<td class="slid-title" align="center" style="font-family: Helvetica, Arial, sans-serif; font-size: 26px; color:#fff !important; padding: 0.8em 0;"><multiline>
												"One Smart Step toward Digital India"</multiline>
											</td>
										</tr>
									
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<!--footer-->
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td class="footer-scale" height="40" style="background-color: #1D1D1D;">&nbsp;</td>
						</tr>
						<tr>
							<td style="background-color: #1D1D1D;">
								<table align="center" border="0" cellpadding="0" cellspacing="0" class="footer container" width="650">
									<tbody>
										<tr>
											<td style="padding-bottom:1em;">
												<table align="left" border="0" cellpadding="0" cellspacing="0" class="footer-left" width="120">
													<tbody><tr>
														<td height="35">
															<a href="#" style="font-size:1em;color:#fff; text-decoration:none;font-family:Maiandra GD,serif;">Smart Narayangaon</a>
														</td>
													</tr></tbody>
												</table>
												<table align="left" border="0" cellpadding="0" cellspacing="0" class="footer-logo" width="400">
													<tbody><tr>
														<td height="35" style="font-family: Helvetica, Arial, sans-serif; font-size: 1em; color: #fff; line-height: 24px;" class="copy-right">
															&copy; <?= date('Y')?> All rights reserved | Design by <a href="http://www.smartnarayangaon.com/" style="color:#3BB9EB; text-decoration:none;">Smart Narayangaon</a>
														</td>
													</tr></tbody>
												</table>
												<table class="social" border="0" align="right" cellpadding="0" cellspacing="0">
													<tbody>
														<tr>
															<td height="35"><a href="#" style="display:block; border:0;"><img src="images/s1.png" alt="" border="0" height="18" width="18"></a></td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td height="35"><a href="#" style="display:block; border:0;"><img src="images/s2.png" alt="" border="0" height="18" width="18"></a></td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td height="35"><a href="#" style="display:block; border:0;"><img src="images/s3.png" alt="" border="0" height="20" width="20"></a></td>
															<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
															<td height="35"><a href="#" style="display:block; border:0;"><img src="images/s4.png" alt="" border="0" height="16" width="16"></a></td>
														</tr>
													</tbody>
												</table>		
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td class="footer-scale" height="40" style="background-color: #1D1D1D;">&nbsp;</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
<?php $this->endPage() ?>
