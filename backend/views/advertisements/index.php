<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdvertisementsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advertisements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertisements-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Advertisements', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             [
                 'attribute'=>'app_id', 
                 'label'=>'App', 
                 'value'=>function ($model, $index, $widget){ return $model->app->name; }
            ],

            'shop_name',
            'owner_name',
            
            [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Logo',
                'value' => function ($data) {
                    return Html::img('../images/'.$data['image'],
                        ['width' => '180px']);
                },
            ],
            'from_date',
            'to_date',
            [
                'attribute' => 'status',
                'value' => function ($data){
                     return $data->status==1 ? "Approved": "Pending";
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
