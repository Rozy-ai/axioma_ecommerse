<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id Родитель
 * @property string $title Заголовок
 * @property string $uri Url
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
 * @property CategoryContent[] $categoryContents
 */
class Category extends \app\models\CustomAR
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'ord', 'created_at', 'show'], 'integer'],
            [['preview', 'content'], 'string'],
            [['created_at'], 'required'],
            [['title', 'uri', 'image', 'seo_title', 'seo_description', 'seo_keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родитель',
            'title' => 'Заголовок',
            'uri' => 'Url',
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
    public function getCategoryContents()
    {
        return $this->hasMany(CategoryContent::className(), ['category_id' => 'id']);
    }
}
