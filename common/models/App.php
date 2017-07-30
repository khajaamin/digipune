<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "app".
 *
 * @property integer $id
 * @property string $name
 * @property string $logo_image
 * @property string $city
 * @property string $about_us
 * @property integer $mobile1
 * @property integer $mobile2
 * @property string $email
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_deleted
 */
class App extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'app';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','about_us','city', 'mobile1', 'mobile2', 'email', 'status'], 'required'],
            [['about_us'], 'string'],
            [['file'],'file'],
            [['mobile1', 'mobile2'], 'integer'],
            [['name', 'city', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'file' => 'Logo Image',
            'city' => 'City',
            'about_us' => 'About Us',
            'mobile1' => 'Mobile1',
            'mobile2' => 'Mobile2',
            'email' => 'Email',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
