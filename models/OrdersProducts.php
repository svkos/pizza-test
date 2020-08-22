<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders_products".
 *
 * @property int $id_order
 * @property int $id_product
 * @property int $quantity
 */
class OrdersProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_order', 'id_product', 'quantity'], 'required'],
            [['id_order', 'id_product', 'quantity'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Order',
            'id_product' => 'Id Product',
        ];
    }

    /**
     * relation with Products table
     */
    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id_product' => 'id_product']);
    }
}
