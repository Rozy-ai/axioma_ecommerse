<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_core".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $model
 * @property integer $user_id
 * @property string $name
 * @property string $h1
 * @property string $anons
 * @property string $news_date
 * @property integer $news_type
 * @property string $content
 * @property string $content2
 * @property integer $act
 * @property integer $ord
 * @property string $url
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $create_time
 * @property string $update_time
 * @property string $image
 * @property string $file
 * @property string $priority
 * @property integer $visit_counter
 * @property double $price
 * @property double $price2
 */
class Core extends UploadFile {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_core';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id', 'user_id', 'news_type', 'act', 'ord', 'visit_counter', 'cat_main'], 'integer'],
//            [['model', 'name', 'h1', 'anons', 'news_date', 'content', 'content2', 'ord', 'title', 'keywords', 'description'], 'required'],
            [['anons', 'content', 'content2', 'cats'], 'string'],
            [['news_date', 'create_time', 'update_time'], 'safe'],
            [['price', 'price2'], 'number'],
//            [['model', 'name', 'h1', 'url', 'title', 'keywords', 'description', 'image', 'file'], 'string', 'max' => 255],
            [['model', 'name', 'h1', 'url', 'title', 'keywords', 'description', 'file'], 'string', 'max' => 255],
            [['priority'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'model' => 'Model',
            'user_id' => 'User ID',
            'name' => 'Наименование',
            'h1' => 'Заголовок H1',
            'anons' => 'Анонс',
            'news_date' => 'News Date',
            'news_type' => 'News Type',
            'content' => 'Содержание',
            'content2' => 'Содержание 2',
            'act' => 'Включено',
            'ord' => 'Порядок',
            'url' => 'Url',
            'title' => 'SEO Title',
            'keywords' => 'SEO Keywords',
            'description' => 'SEO Description',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'image' => 'Изображение',
            'file' => 'File',
            'priority' => 'Priority',
            'visit_counter' => 'Visit Counter',
            'price' => 'Цена',
            'price2' => 'Цена 2',
            'cat_main' => 'Главная категория',
            'cats' => 'Категории',
        ];
    }

    public function beforeSave($insert) {

        if ($this->isNewRecord)
            $this->create_time = time();
        $this->update_time = time();

        return parent::beforeSave($insert);
    }

}
