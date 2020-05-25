<?php

namespace app\modules\catalog\models;

use yii\helpers\Html;
use Yii;
use app\modules\category\models\Category;

class Catalog extends \app\modules\products\models\Product {

    public function afterFind() {
//        $this->cats = unserialize($this->cats);
        parent::afterFind();
    }

    public function beforeValidate() {

//        $this->model = 'ProductionCategory';
//        $this->news_date = date('Y-m-d H:i:s', time());
//        $this->cats = serialize($this->cats);
//        if (!$this->ord)
//            $this->ord = 0;

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


        return ($model = self::find()->where(['url' => $url]
                )->
                andWhere(['is_enable' => 1])
                ->one()) ? $model : false;
    }

    public static function getName($id) {
        return ($model = self::findOne($id)) ? $model->header : 'Имя товара не указано';
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

    public function getCatLink() {

        $category = Category::findOne($this->category_id);

        return Html::a($category->header, ['/category/' . $model->uri, 'title' => $category->header]);
    }

    public function getBreadCatLink() {

        /*        ------------      */
        /*              Fast Cat */
        /*        ------------      */

//        $category = Category::findOne($this->category_id);
//        return ['url' => '/category/' . $category->url, 'label' => $category->header];

        $fc = \app\modules\fast_category\models\FastCategory::findOne($this->fastcat_id);

        Yii::error($fc->header);

        return ['url' => '/fast-cat/' . $fc->url, 'label' => $fc->header];
    }

//    public function doReplace() {
//
//        $this->content_description = strreplace
//
//
//    }
}
