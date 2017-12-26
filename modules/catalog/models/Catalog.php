<?php

namespace app\modules\catalog\models;

use yii\helpers\Html;
use Yii;

class Catalog extends \app\models\Core {

    const PARENT_ID = 187;

    public function afterFind() {
        $this->cats = unserialize($this->cats);
        parent::afterFind();
    }

    public function beforeValidate() {

        $this->model = 'ProductionCategory';
        $this->news_date = date('Y-m-d H:i:s', time());
        $this->cats = serialize($this->cats);
        if (!$this->ord)
            $this->ord = 0;

        return parent::beforeValidate();
    }

//    public static function getRootList() {
//
//        $model = self::find()->where(['parent_id' => self::PARENT_ID, 'act' => 1])
//                        ->orderBy(['ord' => SORT_DESC])->all();
//
//        return $model ? $model : false;
//    }
//
//    public static function getRoot() {
//
//        $model = self::findOne(self::PARENT_ID);
//
//        return $model ? $model : false;
//    }

    public static function getByUrl($url) {

        return ($model = self::find()->where(['url' => $url, 'act' => 1])->one()) ? $model : false;
    }

    public static function getName($id) {
        return ($model = self::findOne($id)) ? $model->name : 'Имя товара не указано';
    }

    public static function getPrice($id) {
        return ($model = self::findOne($id)) ? $model->price : 'Имя товара не указано';
    }

    public function getCatLinks() {

        $result = 'Категории: ';
        $ids = [];
        $ids [] = $this->cat_main;
        $ids = is_array($this->cats) ? array_merge($ids, $this->cats) : $ids;
        $model = \app\models\Category::findAll($ids);

        foreach ($model as $item)
            $result .= ' ' . Html::a($item->title, ['/category/' . $item->uri]);

        return $result;
    }

}
