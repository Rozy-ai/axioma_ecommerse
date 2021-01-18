<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $name Название должности
 * @property string $description Требования
 * @property string $pay З/П
 * @property int $city_id Город
 * @property int $is_close Вакансия закрыта
 */
class Vacancy extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['city_id', 'is_close'], 'integer'],
            [['name'], 'string', 'max' => 500],
            [['pay'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название должности',
            'description' => 'Требования',
            'pay' => 'З/П',
            'city_id' => 'Город',
            'is_close' => 'Вакансия закрыта',
        ];
    }
}
