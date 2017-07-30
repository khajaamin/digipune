<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\App */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo_image')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'about_us')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mobile1')->textInput() ?>

    <?= $form->field($model, 'mobile2')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'status')->dropDownList([ 1 => 'Active', 0 => 'In Active', ], ['prompt' => '---Select Data---']) ?>

    <?php //$form->field($model, 'created_by')->textInput() ?>

    <?php //$form->field($model, 'updated_by')->textInput() ?>

    <?php //$form->field($model, 'created_at')->textInput() ?>

    <?php //$form->field($model, 'updated_at')->textInput() ?>

    <?php //$form->field($model, 'is_deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
