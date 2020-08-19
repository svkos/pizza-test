<?php
namespace app\models;

use Yii;

class Cart{
	
	const SESSION_VAR = 'products';
	public $quantity;
	public $id_product;
	
	private $_cart = array();
	private $_session;
	
	public function __construct(){
		$this->_session = Yii::$app->session;
		//$this->_session->remove('products');die;

		if($this->_session->has('products'))
			$this->_cart = $this->_session->get('products');
		else
			$this->_session->set('products', '');
	}
	
	public function add(){ 
		$position = $this->_findProductInCart();
		if($position !== false){
			$this->addQuantity($position);
		}else{
			$obj = new \stdClass();
			$obj->id_product = $this->id_product;
			$obj->quantity = 1;
			$this->_cart[] = $obj;
			$this->_session->set('products', $this->_cart);
		}
		//$this->_session->remove('products');
		print_r($this->_session->get('products'));
	}
	
	public function getProducts(){
		return $this->_cart;
	}
	
	public function remove(){
		//unset($this->_cart[]);
	}
	
	public function addQuantity($position){
		$this->_cart[$position]->quantity++;
		$this->_session->set('products', $this->_cart);
	}
	
	public function subQuantity($position){
		$this->_cart[$position]->quantity--;
		$this->_session->set('products', $this->_cart);
	}
	
	private function _findProductInCart(){
		foreach($this->_cart as $key=>$value){
			if($value->id_product == $this->id_product)
				return $key;
		}
		return false;
	}
}
?>