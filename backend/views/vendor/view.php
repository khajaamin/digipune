<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $model common\models\Vendor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<div class="row">

     <div class="col-md-6">
   <?= DetailView::widget([
        'model' => $model,
        'attributes' => [            
            'app_id',
            'date',
            'shop_name',
           /* 'category_id',
            'subcategory_id',*/
            'shop_address',
            'shop_image',
            'time_from',
            'time_to',
            'weekly_off',
            'shop_owner',
            'description',
            'mobile',
            'opt_mobileno',
            'email:email',
            'opt_email:email',
            'website',
            'map_location',
            'collected_by',
            'webingeer_coupon',
            'status',
        ],
    ]) ?>


     </div> 

     <div class="col-md-6">

<?php
      $sliders = $model->images;
  if(count($sliders)> 0)
    {
        ?>
<section>
    <div class="">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
      <?php
        $i=0;
       foreach($sliders as $slider){ 
                
       ?>
          <div class="item <?php echo ($i==0)?'active':'';?>">
              <img src="/images/<?= $slider['name'] ?>" alt="slider_image" >            
          </div>
       <?php
    
       $i++; 
      }?>
  </div> 
  <ol class="carousel-indicators">
    <?php  
   
    for ($j=0; $j <= $i; $j++) { 
    ?>
        <li data-target="#carousel-example-generic" data-slide-to="<?= $j?>" ></li>
    <?php }
    
    ?>
  </ol>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
  </a>
</section> 
<?php } ?>



        <?= Alert::widget() ?>
     <?php  echo $this->render('_image_upload', ['model' => $model]); ?>
     </div>

</div>

 

</div>
