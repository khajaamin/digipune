<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sliders".
 *
 * @property integer $id
 * @property integer $app_id
 * @property string $caption
 * @property string $image
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_deleted
 */
class Sliders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'sliders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_id'], 'required'],
            [['app_id'], 'integer'],
            [['file'], 'file'],
            [['caption','file'], 'string', 'max' => 255],
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
            'caption' => 'Caption',
            'file' => 'Image',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
        ];
    }
}
