<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property string $name
 * @property integer $vendor_id
 * @property string $created_on
 * @property integer $is_active
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_id', 'is_active'], 'integer'],
            [['created_on'], 'safe'],
            [['name'], 'string', 'max' => 200],
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
            'vendor_id' => 'Vendor ID',
            'created_on' => 'Created On',
            'is_active' => 'Is Active',
        ];
    }
}
