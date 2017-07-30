<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Sliders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sliders-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php $data = ArrayHelper::map(\common\models\App::find()->asArray()->all(),'id','name');
    ?>
    <?php echo $form->field($model, 'app_id')->dropDownList($data,
        ['prompt'=>'Select Category']);?>

    <?= $form->field($model, 'caption')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
