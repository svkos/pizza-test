<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parameters".
 *
 * @property int $id_parameter
 * @property string $name
 */
class Parameters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parameters';
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
            'id_parameter' => 'Id Parameter',
            'name' => 'Name',
        ];
    }
}
