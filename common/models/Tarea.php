<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tareas}}".
 *
 * @property int $id
 * @property string $descripcion
 * @property int $plan_id
 *
 * @property Plan $plan
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
            [['descripcion', 'plan_id'], 'required'],
            [['plan_id'], 'integer'],
            [['descripcion'], 'string', 'max' => 500],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::class, 'targetAttribute' => ['plan_id' => 'id']],
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
            'plan_id' => 'Plan ID',
        ];
    }

    /**
     * Gets query for [[Plan]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PlanQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plan::class, ['id' => 'plan_id']);
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
