<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="login-page">
<div class="site-login">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">        
            <div class="panel panel-default">
                <div class="panel-heading">
                    Login
                </div>
                <div class="panel-body">   
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'rememberMe')->checkbox() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-block btn-lg btn-success', 'name' => 'login-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>        
                </div>
            </div>
        </div>
    </div>
</div>
</div>