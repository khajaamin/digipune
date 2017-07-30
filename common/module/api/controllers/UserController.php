<?php
namespace common\module\api\controllers;

use yii\web\Controller;
use yii\rest\ActiveController;
use common\models\User;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Default controller for the `api` module
 */
class UserController extends ActiveController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public $modelClass = "common\models\User";

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
		                    'Login' => ['POST'],
		                    'register'=>['POST']
		                    // 'changepass'=>['POST'],
		                    // 'forgotpass'=>['POST']
		                ],

		        ];
		        return $behaviors;
		    }


		 public function actionLogin()
		    {

		        $model = new LoginForm();
		        if ($model->load(\Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
		            unset(\Yii::$app->user->identity->password);
		            return array('status'=>'success','user'=>\Yii::$app->user->identity);
		        } else {
		            $model->validate();
		            if(empty($model->errors)){
		                $error="Please verify Your Email";
		            }else{
		                $error=$model->errors;
		            }
		           return array('status'=>'fail','errors'=>$error); 
		        }
		    }

		     public function actionRegister()
			    {
			        $model = new User();
			        echo Yii::$app->request->post('email');exit;
			     //  echo  $model->email = Yii::$app->request->post('email');
			     //  echo  $model->password_hash = Yii::$app->request->post('password_hash');
			     // echo 	$model->username = Yii::$app->request->post('username');;   
			      echo  $model->authkey = md5(rand()); exit;
			        if ($model->save()) {
			            //$model->welcomeMail($model->email,$subject,$body);
			            unset($model->password);
			            return array('status'=>'success','msg'=>$model);

			        } else {
			            return array('status'=>'fail','errors'=>$model->errors); 
			        }
			    }
    
}
