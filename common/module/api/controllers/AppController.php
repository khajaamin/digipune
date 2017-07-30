<?php
namespace common\module\api\controllers;

use yii\web\Controller;
use yii\rest\ActiveController;
use common\models\User;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\models\App;

/**
 * Default controller for the `api` module
 */
class AppController extends ActiveController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public $modelClass = "common\models\App";

		     public function behaviors()
		    {
		        $behaviors = parent::behaviors();
		       	$behaviors['ContentNegotiator'] = [
		        'class' => \yii\filters\ContentNegotiator::className(),
		        'only' => ['Appdetails'],
		        'formats' => [
		            'application/json' => \yii\web\Response::FORMAT_JSON,
		        ],
		    ];
		  

		        $behaviors['verbs'] = [
		                'class' => VerbFilter::className(),
		                'actions' => [
		                    'appdetails' => ['POST']
		                ],

		        ];
		        return $behaviors;
		    }

		    public function actionAppdetails(){
		    	$model= new App();
		    	$app= $model->find()->all();;
		    	if(!empty($app)){
		    		return array('status'=>'success','App'=>$app);
			      }else{
			      	return  array('status'=>'success','errors'=>$model->errors); 
		    	}
		    }
}
