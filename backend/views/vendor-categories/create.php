<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VendorCategories */

$this->title = 'Create Vendor Categories';
$this->params['breadcrumbs'][] = ['label' => 'Vendor Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendor-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
