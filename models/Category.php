<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $uri
 * @property string $content
 * @property string $image
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 * @property integer $created_at
 */
class Category extends UploadFile {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id', 'created_at', 'show', 'ord'], 'integer'],
            [['content', 'preview'], 'string'],
            [['created_at'], 'required'],
            [['title', 'uri', 'image', 'seo_title', 'seo_description', 'seo_keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'parent_id' => 'Родитель',
            'title' => 'Заголовок',
            'uri' => 'Url',
            'content' => 'Содержание',
            'image' => 'Изображение',
            'seo_title' => 'SEO Title',
            'seo_description' => 'SEO Description',
            'seo_keywords' => 'SEO Keyword',
            'created_at' => 'Создано',
            'show' => 'Показывать категорию в меню',
        ];
    }

    public function getChilds() {
        return $this->hasMany(self::className(), ['parent_id' => 'id']);
    }

}
