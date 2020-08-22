<?php
namespace app\models;

use Yii;

class Cart
{
	const SESSION_VAR = 'products'; 	//name of variable to save cart in session
	public $id_product;
	
	private $_cart = array();
	private $_session;
	
	/*
	 * Initializing session variable for cart storage
	 */
	public function __construct(){
		$this->_session = Yii::$app->session;
		if($this->_session->has(self::SESSION_VAR))
			$this->_cart = $this->_session->get(self::SESSION_VAR);
		else
			$this->_session->set(self::SESSION_VAR, '');
	}
	
	/*
	 * Create product in cart OR if exist add quantity
	 */
	public function add(){ 
		if(!$this->addQuantity()){
			$obj = new \stdClass();
			$obj->id_product = $this->id_product;
			$obj->quantity = 1;
			$this->_cart[] = $obj;
			$this->_session->set(self::SESSION_VAR, $this->_cart);
		}
		return true;
	}
	
	/*
	 * All products in cart
	 * @return array
	 */
	public function getProducts(){
		return $this->_cart;
	}
	
	/*
	 * Total price of cart
	 * @return float
	 */
	public function getTotalPrice(){
		if($this->isEmpty())
			return 0;
		foreach($this->_cart as $value){
			$sum += Products::findOne($value->id_product)->getPrice() * $value->quantity;
		}
		return $sum;
	}
	
	/*
	 * Clear cart in session
	 */
	public function clear(){
		$this->_session->remove(self::SESSION_VAR);
	}
	
	/*
	 * Is empty cart
	 * @return bool
	 */
	public function isEmpty(){
		return empty($this->_cart);
	}
	
	/*
	 * Save confirmed order in Order table with current currency
	 */
	public function saveOrder($id_order){
		foreach($this->_cart as $product){
			$model = new OrdersProducts;
			$model->id_order = $id_order;
			$model->id_product = $product->id_product;
			$model->quantity = $product->quantity;
			$model->price = Products::findOne($product->id_product)->getPrice();
			$model->save();
		}
	}
	
	/*
	 * Remove product from cart
	 */
	public function remove(){
		$position = $this->_findProductInCart();
		unset($this->_cart[$position]);
		$this->_session->set(self::SESSION_VAR, $this->_cart);
	}
	
	/*
	 * Add quantity
	 * @return bool
	 */
	public function addQuantity(){
		$position = $this->_findProductInCart();
		if($position === false) 
			return false;
		$this->_cart[$position]->quantity++;
		$this->_session->set(self::SESSION_VAR, $this->_cart);
		return true;
	}
	
	/*
	 * Subtruct quantity
	 * @return bool
	 */
	public function subQuantity(){
		$position = $this->_findProductInCart();
		if($position === false) 
			return false;
		if($this->_cart[$position]->quantity > 1){
			$this->_cart[$position]->quantity--;
			$this->_session->set(self::SESSION_VAR, $this->_cart);
		}
		return true;
	}
	
	/*
	 * @return false OR found position
	 */
	private function _findProductInCart(){
		if($this->isEmpty())
			return false;
		foreach($this->_cart as $key=>$value){
			if($value->id_product == $this->id_product)
				return $key;
		}
		return false;
	}
}
?>