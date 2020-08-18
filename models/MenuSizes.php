<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_sizes".
 *
 * @property int $id_menu
 * @property int $id_size
 */
class MenuSizes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_sizes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_menu', 'id_size'], 'required'],
            [['id_menu', 'id_size'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_menu' => 'Id Menu',
            'id_size' => 'Id Size',
        ];
    }
}
