<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_core".
 *
 * @property int $id
 * @property int $parent_id
 * @property int $cat_main
 * @property string $cats
 * @property string $model
 * @property int $user_id
 * @property string $name
 * @property string $h1
 * @property string $anons
 * @property string $news_date
 * @property int $news_type
 * @property string $content
 * @property string $content2
 * @property int $act
 * @property int $ord
 * @property string $url
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $create_time
 * @property string $update_time
 * @property string $image
 * @property string $file
 * @property string $priority
 * @property int $visit_counter
 * @property double $price
 * @property double $price2
 */
class TblCore extends \app\models\CustomAR
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_core';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'cat_main', 'user_id', 'news_type', 'act', 'ord', 'visit_counter'], 'integer'],
            [['name', 'anons', 'news_date', 'content', 'content2', 'ord', 'title', 'keywords', 'description'], 'required'],
            [['anons', 'content', 'content2'], 'string'],
            [['news_date', 'create_time', 'update_time'], 'safe'],
            [['price', 'price2'], 'number'],
            [['cats', 'model', 'name', 'h1', 'url', 'title', 'keywords', 'description', 'image', 'file'], 'string', 'max' => 255],
            [['priority'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'cat_main' => 'Cat Main',
            'cats' => 'Cats',
            'model' => 'Model',
            'user_id' => 'User ID',
            'name' => 'Name',
            'h1' => 'H1',
            'anons' => 'Anons',
            'news_date' => 'News Date',
            'news_type' => 'News Type',
            'content' => 'Content',
            'content2' => 'Content2',
            'act' => 'Act',
            'ord' => 'Ord',
            'url' => 'Url',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'image' => 'Image',
            'file' => 'File',
            'priority' => 'Priority',
            'visit_counter' => 'Visit Counter',
            'price' => 'Price',
            'price2' => 'Price2',
        ];
    }
}
