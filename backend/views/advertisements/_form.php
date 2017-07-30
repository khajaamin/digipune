<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Advertisements */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertisements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $data = ArrayHelper::map(\common\models\App::find()->asArray()->all(),'id','name');
    ?>
    <?php echo $form->field($model, 'app_id')->dropDownList($data,
        ['prompt'=>'Select Category']);?>
    

    <?= $form->field($model, 'shop_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owner_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'from_date')->textInput() ?>

    
    <?= $form->field($model, 'from_date')->widget(\yii\jui\DatePicker::classname(), [
        'dateFormat'=>'yyyy-MM-dd',
        //'language' => 'ru',
        //'dateFormat' => 'yyyy-MM-dd',
        'options'=>['class'=>'form-control']
    ]) ?>
    <?php // $form->field($model, 'to_date')->textInput() ?>

    <?= $form->field($model, 'to_date')->widget(\yii\jui\DatePicker::classname(), [
        'dateFormat'=>'yyyy-MM-dd',
        //'language' => 'ru',
        //'dateFormat' => 'yyyy-MM-dd',
        'options'=>['class'=>'form-control']
    ]) ?>
    <?= $form->field($model, 'status')->dropDownList([ 1 => 'Active', 0 => 'In Active', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
