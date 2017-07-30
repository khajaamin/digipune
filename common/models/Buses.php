<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "buses".
 *
 * @property string $id
 * @property string $app_id
 * @property string $source
 * @property string $destination
 * @property string $arrival_time
 * @property string $dept_time
 * @property string $route
 * @property integer $status
 */
class Buses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_id', 'source', 'destination', 'status'], 'required'],
            [['app_id', 'status'], 'integer'],
            [['arrival_time', 'dept_time'], 'safe'],
            [['source', 'destination', 'route'], 'string', 'max' => 255],
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
            'source' => 'Source',
            'destination' => 'Destination',
            'arrival_time' => 'Arrival Time',
            'dept_time' => 'Dept Time',
            'route' => 'Route',
            'status' => 'Status',
        ];
    }

    public function getApp()
    {   
        return $this->hasOne(App::className(), ['id' => 'app_id']);
    }
}
