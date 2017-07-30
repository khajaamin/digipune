<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ratings".
 *
 * @property string $id
 * @property string $shop_id
 * @property string $value
 * @property string $date
 */
class Ratings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ratings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'value'], 'required'],
            [['shop_id', 'value'], 'integer'],
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
            'value' => 'Value',
            'date' => 'Date',
        ];
    }
}
