<?php

namespace backend\controllers;

use Yii;
use common\models\Sliders;
use common\models\SlidersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
/**
 * SlidersController implements the CRUD actions for Sliders model.
 */
class SlidersController extends Controller
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
     * Lists all Sliders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SlidersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sliders model.
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
     * Creates a new Sliders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sliders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            

            $imageName = "slider_image_".rand();
            
            $model->file = UploadedFile::getInstance($model,'image');
            if(!empty($model->file)){
                $model->file->saveAs('../images/sliders/'.$imageName.'.'.$model->file->extension);
                $model->image = 'sliders/'.$imageName.'.'.$model->file->extension;
                $model->save(false);
            }
            
               return $this->redirect(['view', 'id' => $model->id]);
        
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sliders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
           
            $imageName = "slider_image_".rand();

            $model->file = UploadedFile::getInstance($model,'image');

            if(!empty($model->file)){

                $model->file->saveAs('../images/sliders/'.$imageName.'.'.$model->file->extension);

                $model->image = 'sliders/'.$imageName.'.'.$model->file->extension;

                $model->save(false);

                return $this->redirect(['view', 'id' => $model->id]);
           
            }else{

                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sliders model.
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
     * Finds the Sliders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sliders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sliders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
