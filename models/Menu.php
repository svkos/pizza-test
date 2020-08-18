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
            [['image'], 'string', 'max' => 15],
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
            'image' => 'Image',
        ];
    }
}
