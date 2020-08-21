<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "positions".
 *
 * @property int $id_product
 * @property int $id_menu
 * @property int $id_parameter
 * @property int $id_size
 * @property int $usd_price
 * @property int $eur_price
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_menu', 'id_parameter', 'id_size', 'id_image', 'usd_price', 'eur_price'], 'required'],
            [['id_menu', 'id_parameter', 'id_size', 'id_image', 'usd_price', 'eur_price'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Id product',
            'id_menu' => 'Id Menu',
            'id_parameter' => 'Id Parameter',
            'id_size' => 'Id Size',
			'id_image' => 'Id Image',
            'usd_price' => 'Usd Price',
            'eur_price' => 'Eur Price',
        ];
    }
	
    /**
     * relation with Images table
     */
    public function getImage()
    {
        return $this->hasOne(Images::className(), ['id_image' => 'id_image']);
    }

    /**
     * relation with Images table
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id_menu' => 'id_menu']);
    }
	
    /**
     * relation with Images table
     */
    public function getParameter()
    {
        return $this->hasOne(Parameters::className(), ['id_parameter' => 'id_parameter']);
    }
	
	/**
     * relation with Images table
     */
    public function getSize()
    {
        return $this->hasOne(Sizes::className(), ['id_size' => 'id_size']);
    }
	
    /**
     * @return string of current price
     */
    public function getPrice()
    {
        switch(Yii::$app->session->get('currency')){
            case 'USD': return $this->usd_price;
            case 'EUR': return $this->eur_price;
            default: return $this->usd_price;
        }
    }

    /**
     * @return string symbol of current currency
     */
    public static function getCurrency()
    {
        switch(Yii::$app->session->get('currency')){
            case 'USD': return '$';
            case 'EUR': return '€';
            default: return '$';
        }
    }
	
    public static function changeCurrency(){
        $session = Yii::$app->session;
        switch($session->get('currency')){
            case 'USD': return $session->set('currency', 'EUR');
            case 'EUR': return $session->set('currency', 'USD');;
            default: return $session->set('currency', 'USD');;
        }
    }

    public static function getParameterName($id_product,$param){
        return self::findOne($id_product)->{$param}->name;
    }
}
