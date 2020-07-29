<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%plan}}".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Tareas[] $tareas
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%plan}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Tareas]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TareasQuery
     */
    public function getTareas()
    {
        return $this->hasMany(Tareas::class, ['plan_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PlanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PlanQuery(get_called_class());
    }
}
