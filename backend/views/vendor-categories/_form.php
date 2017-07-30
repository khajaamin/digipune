<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\VendorCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendor-categories-form">

    <?php $form = ActiveForm::begin(); ?>

    

       <?php $data = ArrayHelper::map(\common\models\Category::find()->asArray()->all(),'id','category_name');
    ?>
    <? echo $form->field($model, 'category_id')->dropDownList($data,
        ['prompt'=>'Select Category']);?>


  
    <?php $data = ArrayHelper::map(\common\models\Categories::find()->asArray()->all(),'id','category_name');
    ?>
    <? echo $form->field($model, 'category_id')->dropDownList($data,
        ['prompt'=>'Select Category']);?>
   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
