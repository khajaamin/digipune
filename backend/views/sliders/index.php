<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SlidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sliders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sliders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'caption',
            //'image',
            [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Images',
                'value' => function ($data) {
                    return Html::img('../images/'.$data['image'],
                        ['width' => '400px']);
                },
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
