<?php
namespace frontend\modules\apiservice\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\rest\ActiveController;
use yii\web\Response;
use common\models\AdvertisementsSearch; 
use common\models\Advertisements; 
use yii\db\Expression;

/**
 * Site controller
 */
class AdvertiseapiController extends ActiveController
{
    public $modelClass = "common\models\Advertisements";


public function behaviors()
{
    $behaviors = parent::behaviors();
    $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
    

     // remove authentication filter
    $auth = $behaviors['authenticator'];
    unset($behaviors['authenticator']);
    // add CORS filter
    $behaviors['corsFilter'] = [
        'class' => \yii\filters\Cors::className(),
    ];
    // re-add authentication filter
    $behaviors['authenticator'] = $auth;
    // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
    $behaviors['authenticator']['except'] = ['options'];
    return $behaviors;
}


   public function actionList()
    {

        //$city =Yii::$app->request->get('city');
        //$status =Yii::$app->request->get('status'); 
    	$parent_id =Yii::$app->request->get('parent_id'); 
    
        $model = new Advertisements();
    
        if(!empty($parent_id))
        { 
            return $model->find()->where(['app_id'=>1])->asArray()->all();  
        }
        else{
    
            return $model->find()->where(['app_id'=>1])->asArray()->all();   
        } 	    
    }


}


