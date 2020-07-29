<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tareas}}".
 *
 * @property int $id
 * @property string $descripcion
 */
class Tarea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tareas}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TareaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TareaQuery(get_called_class());
    }
}
