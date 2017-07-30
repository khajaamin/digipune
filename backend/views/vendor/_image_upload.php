<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Vendor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendor-form">

    <?php
    
    
     $form = ActiveForm::begin([  'action' => ['vendor/addimage','id'=>$model->id],
        'method' => 'post','options' => [
        'enctype' => 'multipart/form-data'
      
        ]]); ?>
    <div class="panel panel-default">
    <div class="panel-body">
        <div class="">
                <?= $form->field($model, 'id')->textInput(['readonly'=>'readonly','maxlength' => true]) ?>

        <?= $form->field($model, 'shop_image')->fileInput(['maxlength' => true]) ?>
        </div>

        <div class="form-group text-right">
            <?= Html::submitButton("Add Image", ['class' => $model->isNewRecord ? 'btn btn-success ' : 'btn btn-primary']) ?>
        </div>
        </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
