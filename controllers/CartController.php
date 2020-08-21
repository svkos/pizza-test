<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\AccessControl;
use app\models\Products;
use app\models\Cart;
use app\models\Orders;
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
        $cart = new Cart;
        $order = new Orders;

        if ($order->load(Yii::$app->request->post()) AND !$cart->isEmpty()){
            $order->save();
            $id_order = $order->getPrimaryKey();
            $cart->saveOrder($id_order);
            $cart->clear();
            Yii::$app->session->setFlash('success', "Thanks for your order! Your order number ".$id_order.'.');
            return $this->redirect(['index/index']);
        }

        return $this->render('cart', [
            'products' => $cart->getProducts(),
            'total' => $cart->getTotalPrice(),
            'order' => $order,
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

    /**
     * Remove from cart ajax action.
     * @return true|false
     */
    public function actionRemoveFromCart()
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            $cart = new Cart;
            $cart->id_product = (int)$request->post('id_product');
            return $cart->remove();
        }
    }
	
    /**
     * Add quantity ajax action.
     * @return true|false
     */
    public function actionAddQuantity()
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            $cart = new Cart;
            $cart->id_product = (int)$request->post('id_product');
            return $cart->addQuantity();
        }
    }

    /**
     * Sub quantity ajax action.
     * @return true|false
     */
    public function actionSubQuantity()
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            $cart = new Cart;
            $cart->id_product = (int)$request->post('id_product');
            return $cart->subQuantity();
        }
    }

    /**
     * Change currency variable in session
     */
    public function actionChangeCurrency()
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            Products::changeCurrency();
        }
    }

    /**
     * Get cart icon with price
     * @return string html
     */
    public function actionGetSmallCart()
    {
        if(Yii::$app->request->isAjax){
            $cart = new Cart;
            $total = $cart->getTotalPrice();
            if($total != 0)
                return $this->renderPartial('small-cart',[
                    'totalPrice' => $total,
                    'currency' => Products::getCurrency(),
                ]);
        }
    }
}
