<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advertisements".
 *
 * @property integer $id
 * @property integer $app_id
 * @property string $shop_name
 * @property string $owner_name
 * @property string $image
 * @property string $from_date
 * @property string $to_date
 * @property integer $status
 */
class Advertisements extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'advertisements';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_id', 'shop_name', 'owner_name','from_date', 'to_date', 'status'], 'required'],
            [['file'],'file'],
            [['app_id', 'status'], 'integer'],
            [['from_date', 'to_date'], 'safe'],
            [['shop_name', 'owner_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_id' => 'App ID',
            'shop_name' => 'Shop Name',
            'owner_name' => 'Owner Name',
            'image' => 'Image',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'status' => 'Status',
        ];
    }
    public function getApp()
    {   
        return $this->hasOne(App::className(), ['id' => 'app_id']);
    }
}
