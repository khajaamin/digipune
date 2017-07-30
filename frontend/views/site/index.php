<?php
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;



$this->title = 'Smart Narayangaon';
?>
	<div class="main-banner banner text-center">
	  <div class="container">    
			<h1>Smart Step<span class="segment-heading">    towards </span> Digital India</h1>
			<p></p>
            <a href="post-ad.html">Ad With Us</a>
	  </div>
	</div>

    	<div class="content">
            <div class="trending-ads">
                <div class="trend-ads">
                     <h2>Our Services</h2>
                 </div>                      
                <div class="categories">
                    <div class="container">
                        <?=  \yii\widgets\ListView::widget([
                                'dataProvider' => $dataProvider,
                                'options'=>[
                                    'tag'=>'div',
                                    'class'=>'list-wrapper',
                                    'id'=>'list-wrapper'
                                ],
                                'layout'=> "{summary}\n{items}\n\n<div class='clearfix'></div><div class='row'>{pager}</div>",
                                'itemView'=>'_service_item',
                            ])
                        ?>		

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

  