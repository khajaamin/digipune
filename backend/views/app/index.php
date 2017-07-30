<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AppSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create App', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            
            [
                'attribute' => 'logo_image',
                'format' => 'html',
                'label' => 'Logo',
                'value' => function ($data) {
                    return Html::img('../images/'.$data['logo_image'],
                        ['width' => '100%']);
                },
            ],

            'city',
             //'status',
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
