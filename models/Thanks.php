<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "thanks".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $image Изображение
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
        ];
    }
}
