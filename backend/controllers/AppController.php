<?php

namespace backend\controllers;

use Yii;
use common\models\App;
use common\models\AppSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * AppController implements the CRUD actions for App model.
 */
class AppController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','view','update','delete','logout'],
                'rules' => [
                    [
                        'actions' => ['index','create','view','update','delete','logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * Lists all App models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single App model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new App model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new App();

        $model->created_by = Yii::$app->user->identity->id;
        $model->updated_by = Yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post())) {
            
            $imageName = "app_image_".rand();
            $model->file = UploadedFile::getInstance($model,'logo_image');
            if(!empty($model->file)){          
                
                $model->file->saveAs('../images/app/'.$imageName.'.'.$model->file->extension);
                $model->logo_image = 'app/'.$imageName.'.'.$model->file->extension;
            
            }
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing App model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $imageName = "app_image_".rand();

            $model->file = UploadedFile::getInstance($model,'logo_image');

            if(!empty($model->file)){

                $model->file->saveAs('../images/app/'.$imageName.'.'.$model->file->extension);

                $model->logo_image = 'app/'.$imageName.'.'.$model->file->extension;

                $model->save(false);

                return $this->redirect(['view', 'id' => $model->id]);
           
            }else{

                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }

            //return $this->redirect(['view', 'id' => $model->id]);
        
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing App model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the App model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return App the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = App::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
