<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property integer $id
 * @property integer $app_id
 * @property string $date
 * @property string $shop_name
 * @property integer $category_id
 * @property integer $subcategory_id
 * @property string $shop_address
 * @property string $shop_image
 * @property string $time_from
 * @property string $time_to
 * @property string $weekly_off
 * @property string $shop_owner
 * @property string $description
 * @property integer $mobile
 * @property integer $opt_mobileno
 * @property string $email
 * @property string $opt_email
 * @property string $website
 * @property double $map_location
 * @property string $collected_by
 * @property string $webingeer_coupon
 * @property integer $status
 * @property integer $ratings
 * @property double $latitude
 * @property double $lognitude
 * @property double $zipcode 
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public $ratings;

    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_name', 'shop_address', 'shop_owner', 'description', 'mobile','zipcode'], 'required'],
            [['app_id','mobile', 'opt_mobileno', 'status','ratings'], 'integer'],
            [['shop_image'],'required','on'=>'needimage'],
            [['file'],'file'],
            [['date', 'time_from', 'time_to','ratings','latitude','lognitude'], 'safe'],
            [['map_location','latitude','lognitude', 'zipcode'], 'number'],
            [['webingeer_coupon'], 'string'],
            [['shop_name', 'shop_address',  'weekly_off', 'shop_owner', 'description', 'email', 'opt_email', 'website', 'collected_by'], 'string', 'max' => 255],
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
            'date' => 'Date',
            'shop_name' => 'Shop Name',
            'category_id' => 'Category ID',
            'subcategory_id' => 'Subcategory ID',
            'shop_address' => 'Shop Address',
            'shop_image' => 'Shop Image',
            'time_from' => 'Time From',
            'time_to' => 'Time To',
            'weekly_off' => 'Weekly Off',
            'shop_owner' => 'Shop Owner',
            'description' => 'Description',
            'mobile' => 'Mobile',
            'opt_mobileno' => 'Opt Mobileno',
            'email' => 'Email',
            'opt_email' => 'Opt Email',
            'website' => 'Website',
            'map_location' => 'Map Location',
            'collected_by' => 'Collected By',
            'webingeer_coupon' => 'Webingeer Coupon',
            'status' => 'Status',
            'ratings'=>"Ratings",
            'latitude'=>"Latitude",
            'lognitude'=>"Logitude",
            'zipcode' => 'Zipcode'
        ];
    }

    public function getRatings()
    {
        return $this->hasMany(Ratings::className(), ['shop_id' => 'id']);
    }

    public  function ratingsAvg($id)
    {
        $sql =  "SELECT avg(r.value) as ratings FROM vendor v, vendor_categories vc, ratings r  WHERE v.id = r.shop_id AND v.id=:vendorId";  
        $vendor = $this::findBySql($sql,[':vendorId'=>$id])->all();
            return $vendor[0]->ratings;
    }

    public  function categoryDetails($id)
    {
        $sql =  "SELECT c.*  FROM  vendor_categories vc, categories c  WHERE vc.category_id = c.id AND vc.vendor_id=:vendorId";  
        $vendor = $this::findBySql($sql,[':vendorId'=>$id])->all();
            
        echo "<pre>";print_r($vendor); exit; 
        return $vendor;
    }

   public function getUser()
    {
        return $this->hasMany(VendorCategories::className(), ['vendor_id' => 'id']);
    }

    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['id' => 'category_id'])
                ->viaTable('vendor_categories', ['vendor_id' => 'id']);

    }
     public function getImages()
    {
        return $this->hasMany(Images::className(), ['vendor_id' => 'id']);
    }
    public function getApp()
    {   
        return $this->hasOne(App::className(), ['id' => 'app_id']);
    }


}
