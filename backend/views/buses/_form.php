<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Buses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $data = ArrayHelper::map(\common\models\App::find()->asArray()->all(),'id','name');
    ?>
    <?php echo $form->field($model, 'app_id')->dropDownList($data,
        ['prompt'=>'Select Category']);?>

    <?= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arrival_time')->textInput() ?>

    <?= $form->field($model, 'dept_time')->textInput() ?>

    <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 1 => 'Active', 0 => 'In Active', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
