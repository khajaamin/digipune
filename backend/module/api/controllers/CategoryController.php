<?php

namespace app\module\api\controllers;

use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class CategoryController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	echo "Hi";
        return $this->render('index');
    }
}
