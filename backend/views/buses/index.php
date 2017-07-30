<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BusesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buses-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Buses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                 'attribute'=>'app_id', 
                 'label'=>'App', 
                 'value'=>function ($model, $index, $widget){ return $model->app->name; }
            ],

            'source',
            'destination',
            //'arrival_time',
            // 'dept_time',
            // 'route',
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
