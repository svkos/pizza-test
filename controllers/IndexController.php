<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use app\models\Menu;
/**
 * IndexController implements the CRUD actions for Menu model.
 */
class IndexController extends Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
					[
                        'allow' => true,
                        'actions' => [],
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }
	
    /**
     * List all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {				
        $menuAll = Menu::find()->all();

        return $this->render('index', [
            'menuAll' => $menuAll,
        ]);

    }
}
