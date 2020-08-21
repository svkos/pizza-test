<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id_order
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $flat
 * @property string $floor
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'address', 'flat', 'floor'], 'required'],
            [['name'], 'string', 'max' => 40],
			['phone', 'number'],
			['email', 'email'],
            [['phone'], 'string', 'max' => 15],
            [['address'], 'string', 'max' => 400],
            [['flat'], 'string', 'max' => 10],
            [['floor'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Order',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'flat' => 'Flat \ Office',
            'floor' => 'Floor',
        ];
    }
}
