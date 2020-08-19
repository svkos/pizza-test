<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use app\models\Products;
use app\models\Cart;
/**
 * CartController implements the CRUD actions for Menu model.
 */
class CartController extends Controller
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
     * Show cart.
     * @return mixed
     */
    public function actionCart(){
        $model = new Cart;
        return $this->render('cart', [
            'model' => $model->getProducts(),
        ]);
    }
    
    /**
     * Add to cart ajax action.
     * @return true|false
     */
    public function actionAddtocart()
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            $cart = new Cart;
            $cart->id_product = Products::find()->where($request->post())->one()->id_product;
            return $cart->add();
        }
    }
}
