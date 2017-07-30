<?php
namespace frontend\modules\api\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\rest\ActiveController;
use yii\web\Response;
use common\models\AppSearch; 
use common\models\App; 
use yii\db\Expression;

/**
 * Site controller
 */
class AppapiController extends ActiveController
{
    public $modelClass = "common\models\App";


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

        $city =Yii::$app->request->get('city');
        $status =Yii::$app->request->get('status'); 
    	$model = new App();
      	
        if(!empty($city))
    	{ 
            return $model->find()->where(['status'=>1])->all();
	    	//return $model->find()->where(['city'=>'Narayangaon'])->andWhere(['=','status',1])->asArray()->one();	
    	}
    	else{
	    	return $model->find()->where(['city'=>'Narayangaon'])->andWhere(['=','status',1])->asArray()->one();	
    	}	    
     }


}


