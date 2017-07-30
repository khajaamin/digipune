<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\db\Expression;
/* @var $this yii\web\View */
/* @var $model common\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php $data = ArrayHelper::map(\common\models\App::find()->asArray()->all(),'id','name');
    ?>
    <?php echo $form->field($model, 'app_id')->dropDownList($data,
        ['prompt'=>'Select Category']);?>
    
    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>
    <?php $data = ArrayHelper::map(\common\models\Categories::find()->where(['OR',
                                               ['IS', 'parent_id', (new Expression('Null'))],
                                               ['parent_id' =>0]])->asArray()->all(),'id','category_name');
    ?>
    <?php echo $form->field($model, 'parent_id')->dropDownList($data,
        ['prompt'=>'Select Category']);?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'logo_image')->fileInput(['maxlength' => true]) ?>

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
