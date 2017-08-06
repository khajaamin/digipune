<?php
namespace frontend\modules\apiservice\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\rest\ActiveController;
use yii\web\Response;
use common\models\Ratings; 
use common\models\Users;
use common\models\User;
use yii\db\Expression;
use linslin\yii2\curl;
use yii\web\JsExpression;

/**
 * Site controller
 */
class UsersapiController extends ActiveController
{
    public $modelClass = "common\models\Users";
    //public enableCsrfValidation = false;

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

    public function actionSignup()
    {
       
        $model = new Users();

         $data =  json_decode(utf8_encode(file_get_contents("php://input")), false);
         if(empty($data)){

                    $response['message']='Something Went Wrong';

                    return $response;
                 
            }else{
                $model->contact= $data->mobile;
                $model->username = $data->name;
                $model->email = (isset($data->email))?$data->email:"";
                
                $mob = $data->mobile;
                $user = User::find()->where([
                'contact' => $model->contact
                ])->count();
                if($user == 1){
                    
                    $user = User::find()->where(['contact' => $model->contact])->one();
                    
                    $otp = rand(5000,10000); 
                    $user->otp = $otp; 
                    $user->updated_at = time(); 

                   // $stat=Yii::$app->db->createCommand("UPDATE user SET otp=:otp WHERE id=:id")->bindValue(':otp',$otp)->bindValue(':id', $user->id)->execute();
                    
                    if($user->save(false)){

                        if (extension_loaded('curl')) {
                            $verify = Yii::$app->SmsResponse->getResponse($mob,$otp); 
                        }
                        if(!empty($user->email)){
                        
                            $model->sendEmail(Yii::$app->params['adminEmail'],$otp);
                        
                        }                           

                        $response['status']='exist';
                        
                        $response['message']='You Have Already Registered click Ok to get New OTP';
                        $user->otp = "" ; 
                        $response['data']=$user;
                        
                        return $response;
                    
                    }else{

                        $response['error']='Please Try Again';
                    }
                    
                }else{

                $random = rand(5000,10000);                                 
                  $model->auth_key = $random;
                  $model->password_hash = $random;
                  $model->otp = $random;
                  $model->created_at = time(); 
                  $model->updated_at = time();               
                    if($model->save(false)){

                        // //Sms intrigration goes here
                       // //Send SMS and save otp into same object
                        
                        
                        if (extension_loaded('curl')) {
                             $verify = Yii::$app->SmsResponse->getResponse($mob,$random); 
                        }
                             if(!empty($model->email)){
                                 $model->sendEmail(Yii::$app->params['adminEmail'],$model->otp);
                             }                           
                             $response['otp']="OTP sent";
                                            
                             $response["message"]="Please Check Your Mobile or Email";
                             $response["data"] = $model;          
                             $response["status"] = "success";   
                             return $response; 
                    }else{

                        $response['title']="Server Error";
                        $response['message']="Please Try Again";
                        $response["status"] = "error";
                        $response["data"] =  $model->errors;  
                        return $response;
                    }


                }   
               

            }
    }



    public function actionRating()
    {
        $rating = new Ratings();
        $data =  json_decode(utf8_encode(file_get_contents("php://input")), false); 
        if(empty($data)  && empty($data->user_id)){

            $response["message"]='sorry something went wrong';
            return $response;
        }else{
            $rating->shop_id = $data->id;
            $rating->value = $data->rate;
            $rating->user_id = $data->user_id;
            if($rating->save()){

                $response["message"]="Thank You";
                      
                return $response;

            }
        }
    }

    public function actionVerify()
    {
        $model = new Users();

         $data =  json_decode(utf8_encode(file_get_contents("php://input")), false);
         
         if(empty($data)){
                
                 // $mobile = 8899007766;
                 // $otp = 9841;
                 // $verify = $model->find()->where(['contact'=>$mobile,'otp'=>$otp])->one();
                $response["message"]='sorry something went wrong';
                //return $verify;
            }else{

                    
                 $verify = $model->find()->where(['contact'=>$data->mobile,'otp'=>$data->otp])->asArray()->one();
                 
                 if(empty($verify)){
                    $response['title']="Verification Failed";               
                    $response['message']="OTP Does Not Match";
                    $response["status"] = "error";
                    $response["data"] =  $verify;  
                    return $response;
                
                 }else{

                    $response["message"]="Welcome";
                    $response["data"] = $verify;          
                    $response["status"] = "success";                              
                    return $response;
                    
                 }
                

            }
    }




}
