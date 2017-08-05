<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property integer $app_id
 * @property string $category_name
 * @property integer $parent_id
 * @property string $description
 * @property string $logo_image
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_deleted
 * @property integer $order 
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file; 

    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['app_id','category_name'], 'required'],
            [['app_id', 'parent_id', 'created_by', 'updated_by', 'is_deleted', 'order'], 'integer'],
            [['file'],'file'],
            [['description'], 'string'],
            [['category_name'], 'string', 'max' => 255],
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
            'category_name' => 'Category Name',
            'parent_id' => 'Parent ID',
            'description' => 'Description',
            'logo_image' => 'Logo Image',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
             'order' => 'Order'
        ];
    }
    public function getApp()
    {
        return $this->hasOne(App::className(), ['id' => 'app_id']);
    }

    public function getCategory()
    {   
        return $this->hasOne(Categories::className(), ['id' => 'parent_id']);
    }



}
