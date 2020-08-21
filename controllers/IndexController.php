<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use app\models\Menu;
use app\models\Products;
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

    public function beforeAction($action)
    {
        $session = Yii::$app->session;
        if(!$session->has('currency'))		// initialize if first start application
            $session->set('currency', 'USD');
        return parent::beforeAction($action);
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

    /**
     * @return string path of product's image
     */
    public function actionGetImage()
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            $product = Products::find()->where($request->post())->one();
            return '/image/'.$product->image->name;
        }
    }

    /**
     * @return string price of product
     */
    public function actionGetPrice()
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            return Products::find()->where($request->post())->one()->getPrice();
        }
    }
}