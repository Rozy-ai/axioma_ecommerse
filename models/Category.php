<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $header Заголовок
 * @property string $url Url
 * @property string $preview Превью
 * @property string $content Содержание
 * @property string $image Изображение
 * @property string $ico Иконка
 * @property int $ord Порядок (обратный)
 * @property string $title SEO Title
 * @property string $description SEO Description
 * @property string $keywords SEO Keyword
 * @property int $created_at Создано
 * @property int $is_enable Включено
 * @property int $parent_id Родительская категория
 * @property int $show_in_home Показывать на главной
 * @property int $in_home_order Порядок на главной
 * @property double $price Цена на главной
 * @property int $in_menu Показывать в верхнем меню
 * @property int $in_menu_order Порядок в меню
 *
 * @property Product[] $products
 */
class Category extends \app\models\CustomAR
{
    public $is_ar;
    public $is_video;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preview', 'content'], 'string'],
            [['ord', 'created_at', 'is_enable', 'parent_id', 'show_in_home', 'in_home_order', 'in_menu', 'in_menu_order'], 'integer'],
            [['price'], 'number'],
            [['in_menu_order'], 'required'],
            [['header', 'url', 'image', 'ico',' banner_url'], 'string', 'max' => 255],
            [['title', 'description', 'keywords'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header' => 'Заголовок',
            'url' => 'Url',
            'preview' => 'Превью',
            'content' => 'Содержание',
            'image' => 'Изображение',
            'ico' => 'Иконка',
            'ord' => 'Порядок (обратный)',
            'title' => 'SEO Title',
            'description' => 'SEO Description',
            'keywords' => 'SEO Keyword',
            'created_at' => 'Создано',
            'is_enable' => 'Включено',
            'parent_id' => 'Родительская категория',
            'show_in_home' => 'Показывать на главной',
            'in_home_order' => 'Порядок на главной',
            'price' => 'Цена на главной',
            'in_menu' => 'Показывать в верхнем меню',
            'in_menu_order' => 'Порядок в меню',
            'banner_url' => 'Ссылка баннера',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}
