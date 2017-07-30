<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Categories', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id',
//            'app_id',
             [
                 'attribute'=>'app_id', 
                 'label'=>'App', 
                 'value'=>function ($model, $index, $widget){ return $model->app->name; }
            ],
            'category_name',
            'parent_id',
            // 'description:ntext',
             //'logo_image',
           [
                'attribute' => 'logo_image',
                'format' => 'html',
                'label' => 'Logo',
                'value' => function ($data) {
                    return Html::img('../images/'.$data['logo_image'],
                        ['width' => '75px']);
                },
            ],
            // 'created_by',
            // 'updated_by',
            // 'created_at',
            // 'updated_at',
            // 'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
