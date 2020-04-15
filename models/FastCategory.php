<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fast_category".
 *
 * @property int $id
 * @property string $header Заголовок
 * @property string $image Изображение
 * @property string $url Url
 * @property string $content Содержание
 * @property int $ord Порядок (обратный)
 * @property string $title SEO Title
 * @property string $description SEO Description
 * @property string $keywords SEO Keyword
 * @property int $created_at Создано
 * @property int $is_enable Включено
 * @property int $is_ar Акустика/Радио
 * @property int $is_video Видео
 */
class FastCategory extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fast_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['ord', 'created_at', 'is_enable', 'is_ar', 'is_video'], 'integer'],
            [['header', 'image', 'url'], 'string', 'max' => 255],
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
            'image' => 'Изображение',
            'url' => 'Url',
            'content' => 'Содержание',
            'ord' => 'Порядок (обратный)',
            'title' => 'SEO Title',
            'description' => 'SEO Description',
            'keywords' => 'SEO Keyword',
            'created_at' => 'Создано',
            'is_enable' => 'Включено',
            'is_ar' => 'Акустика/Радио',
            'is_video' => 'Видео',
        ];
    }
}
