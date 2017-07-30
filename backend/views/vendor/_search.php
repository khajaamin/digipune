<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VendorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'app_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'shop_name') ?>

    <?= $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'subcategory_id') ?>

    <?php // echo $form->field($model, 'shop_address') ?>

    <?php // echo $form->field($model, 'shop_image') ?>

    <?php // echo $form->field($model, 'time_from') ?>

    <?php // echo $form->field($model, 'time_to') ?>

    <?php // echo $form->field($model, 'weekly_off') ?>

    <?php // echo $form->field($model, 'shop_owner') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'opt_mobileno') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'opt_email') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'map_location') ?>

    <?php // echo $form->field($model, 'collected_by') ?>

    <?php // echo $form->field($model, 'webingeer_coupon') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
