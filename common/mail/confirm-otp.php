<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */


?>
<div class="password-reset">
    <p>Hello <?= Html::encode($username) ?>,</p>

    <p>Verify Your Account By Enter following OTP </p>

    <p><?= Html::encode($otp) ?></p>
    
    <p>Thank You..!!!</p>
</div>
