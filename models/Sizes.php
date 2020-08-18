<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sizes".
 *
 * @property int $id_size
 * @property string $name
 */
class Sizes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sizes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_size' => 'Id Size',
            'name' => 'Name',
        ];
    }
}
