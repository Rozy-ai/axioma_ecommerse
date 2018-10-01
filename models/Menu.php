<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property int $menu_type Меню
 * @property string $name Имя пункта
 * @property string $title Имя ссылки
 * @property string $url
 * @property int $is_active Включено
 * @property int $order Порядок
 */
class Menu extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_type', 'name'], 'required'],
            [['menu_type', 'is_active', 'order'], 'integer'],
            [['name', 'title', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_type' => 'Меню',
            'name' => 'Имя пункта',
            'title' => 'Имя ссылки',
            'url' => 'Url',
            'is_active' => 'Включено',
            'order' => 'Порядок',
        ];
    }
}
