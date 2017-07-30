<?php

namespace app\module\api\controllers;

use yii\web\Controller;
use yii\rest\ActiveController;
/**
 * Default controller for the `api` module
 */
class CategoriesController extends ActiveController
{

	public $modelClass = '\common\models\Categories'; 

}
