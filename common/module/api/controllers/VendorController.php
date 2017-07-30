<?php
namespace common\module\api\controllers;


use yii\web\Controller;
use yii\rest\ActiveController;
use common\models\Vendors;
use yii\filters\VerbFilter;
/**
 * Default controller for the `api` module
 */
class VendorController extends ActiveController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public $modelClass = "common\models\Vendors";
    
     public function behaviors()
		    {
		        $behaviors = parent::behaviors();
		       $behaviors['ContentNegotiator'] = [
		        'class' => \yii\filters\ContentNegotiator::className(),
		        'only' => ['index', 'view'],
		        'formats' => [
		            'application/json' => \yii\web\Response::FORMAT_JSON,
		        ],
		    ];
		  

		        $behaviors['verbs'] = [
		                'class' => VerbFilter::className(),
		                'actions' => [
		                    'Indexnew'=>['POST']
		                ],

		        ];
		        return $behaviors;
		    }

		    public function actionIndexnew()
			    {
			     $model= new Vendors();
			      $vendor = $model->find()->all();
			      if(!empty($vendor)){
			      	return array('status'=>'success','Vendors'=>$vendor);
			      }else{
			      	return  array('status'=>'success','errors'=>$model->errors); 
			      }
			    }

}