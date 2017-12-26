<?php

namespace app\modules\options\models;

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
class TblCoreOld extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_core';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb() {
        return Yii::$app->get('db_old');
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id', 'user_id', 'news_type', 'act', 'ord', 'visit_counter'], 'integer'],
            [['model', 'name', 'h1', 'anons', 'news_date', 'content', 'content2', 'ord', 'title', 'keywords', 'description'], 'required'],
            [['anons', 'content', 'content2'], 'string'],
            [['news_date', 'create_time', 'update_time'], 'safe'],
            [['price', 'price2'], 'number'],
            [['model', 'name', 'h1', 'url', 'title', 'keywords', 'description', 'image', 'file'], 'string', 'max' => 255],
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

    public function getParentName() {

        $model = self::find()->where(['parent_id' => $this->id, 'model' => 'ProductionTab'])
                ->one();
//        echo 1;

//        print_r($model);
//        return $model ? $model->name : false;
        return $model ? true : false;
    }

}
