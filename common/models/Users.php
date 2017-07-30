<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $contact
 * @property string $city
 * @property string $otp
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'contact', 'city', 'otp', 'created_at', 'updated_at'], 'required'],
            [['contact', 'otp', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'city'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'contact' => 'Contact',
            'city' => 'City',
            'otp' => 'Otp',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function sendEmail($email,$otp)
    {
     	
        return Yii::$app
            ->mailer
            ->compose(['html' => 'confirm-otp'], ['otp' => $otp,'username' => $this->username])
            ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name])
            ->setTo($this->email)
            ->setSubject('Smart Narayangaon Verify OTP')
            ->send();
    }
}
