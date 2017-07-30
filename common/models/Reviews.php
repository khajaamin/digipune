<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property string $id
 * @property string $shop_id
 * @property string $message
 * @property integer $status
 * @property string $date
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'message', 'status'], 'required'],
            [['shop_id', 'status'], 'integer'],
            [['message'], 'string'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_id' => 'Shop ID',
            'message' => 'Message',
            'status' => 'Status',
            'date' => 'Date',
        ];
    }
}
