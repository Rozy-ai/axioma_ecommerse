<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property int $id
 * @property int $type_id Тип контента
 * @property string $header Заголовок
 * @property string $image Изображение
 * @property string $url
 * @property string $anons Анонс
 * @property string $content Содержание
 * @property int $ord Порядок
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property int $is_enable Включено
 * @property int $created_at
 * @property int $updated_at
 * @property int $is_main
 */
class Content extends \app\models\CustomAR
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'url'], 'required'],
            [['type_id', 'ord', 'is_enable', 'created_at', 'updated_at', 'is_main'], 'integer'],
            [['anons', 'content'], 'string'],
            [['header', 'title', 'description', 'keywords'], 'string', 'max' => 500],
            [['image', 'url'], 'string', 'max' => 255],
            [['url'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Тип контента',
            'header' => 'Заголовок',
            'image' => 'Изображение',
            'url' => 'Url',
            'anons' => 'Анонс',
            'content' => 'Содержание',
            'ord' => 'Порядок',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'is_enable' => 'Включено',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_main' => 'Is Main',
        ];
    }
}
