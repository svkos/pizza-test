<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id_menu
 * @property string $name
 * @property string $description
 * @property string $nutrition
 * @property string $image
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'nutrition', 'image'], 'required'],
            [['name'], 'string', 'max' => 80],
            [['description'], 'string', 'max' => 400],
            [['nutrition'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_menu' => 'Id Menu',
            'name' => 'Name',
            'description' => 'Description',
            'nutrition' => 'Nutrition',
        ];
    }

    /**
     * relation with Sizes table
     */
    public function getSizes()
    {
        return $this->hasMany(Sizes::className(), ['id_size' => 'id_size'])
                    ->viaTable('menu_sizes', ['id_menu' => 'id_menu']);
    }
	
    /**
     * relation with Parameters table
     */
    public function getParameters()
    {
        return $this->hasMany(Parameters::className(), ['id_parameter' => 'id_parameter'])
                    ->viaTable('menu_parameters', ['id_menu' => 'id_menu']);
    }
	
    /**
     * relation with Positions table and get default products
     */
    public function getDefaultProduct()
    {
        return $this->hasOne(Products::className(), ['id_menu' => 'id_menu'])
                    ->andOnCondition(['is_default' => '1']);
    }
}
