<?php
namespace frontend\modules\apiservice\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\rest\ActiveController;
use yii\web\Response;
use common\models\BusesSearch; 
use common\models\Buses; 
use yii\db\Expression;

/**
 * Site controller
 */
class BusesapiController extends ActiveController
{
    public $modelClass = "common\models\Buses";


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
    	$model = new Buses();  
        $name =Yii::$app->request->get('name'); 
    	
        $buses=$model->find()->select('destination')->distinct()->where(['source'=>$name, 'status'=>1,'app_id'=>1])->asArray()->all();
        return $buses;

    }


    public function actionSourcelist()
    {        
    	$model = new Buses();      	
        $buses=$model->find()->select('source')->distinct()->where(['status'=>1,'app_id'=>1])->asArray()->all();
        return $buses;

    }
    public function actionDetail()
    {
    	$model = new Buses(); 
    	$source =Yii::$app->request->get('source'); 
        $destination =Yii::$app->request->get('destination'); 

    	
        $buses=$model->find()->where(['source'=>$source, 'destination'=>$destination,'status'=>1,'app_id'=>1])->asArray()->all();
        return $buses;
    	
    }

    public function actionArrivalbus()
    {
    	$model = new Buses(); 
    	$destination =Yii::$app->request->get('name'); 
    	//$detail = 'Pune';
    	if(!empty($destination))
    	{
    	    $buses=$model->find()->where(['destination'=>$destination,'status'=>1,'app_id'=>1])->asArray()->all();
    	    return $buses;
    	}else{

    		 $buses=$model->find()->where(['destination'=>$detail,'status'=>1,'app_id'=>1])->asArray()->all();
    	    return $buses;
    	}
    }


}


