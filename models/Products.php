<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "positions".
 *
 * @property int $id_position
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
            'id_position' => 'Id Position',
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
}
