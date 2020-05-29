<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "thanks".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $image Изображение
 * @property int $is_enable Включено
 * @property int $order Порядок
 */
class Thanks extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'thanks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_enable'], 'required'],
            [['is_enable', 'order'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'image' => 'Изображение',
            'is_enable' => 'Включено',
            'order' => 'Порядок',
        ];
    }
}
