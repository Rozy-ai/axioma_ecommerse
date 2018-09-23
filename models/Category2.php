<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category2".
 *
 * @property int $id
 * @property int $parent_id Родитель
 * @property string $header Заголовок
 * @property string $url Url
 * @property string $preview Превью
 * @property string $content Содержание
 * @property string $image Изображение
 * @property int $ord Порядок
 * @property string $seo_title SEO Title
 * @property string $seo_description SEO Description
 * @property string $seo_keywords SEO Keyword
 * @property int $created_at Создано
 * @property int $show
 *
 * @property Product[] $products
 */
class Category2 extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'ord', 'created_at', 'show'], 'integer'],
            [['preview', 'content'], 'string'],
            [['header', 'url', 'image', 'seo_title', 'seo_description', 'seo_keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родитель',
            'header' => 'Заголовок',
            'url' => 'Url',
            'preview' => 'Превью',
            'content' => 'Содержание',
            'image' => 'Изображение',
            'ord' => 'Порядок',
            'seo_title' => 'SEO Title',
            'seo_description' => 'SEO Description',
            'seo_keywords' => 'SEO Keyword',
            'created_at' => 'Создано',
            'show' => 'Show',
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
