<?php

namespace app\modules\category\models;

use Yii;

class Category extends \app\models\Category2 {

    public $products = [];


    public static function getList() {

        $result[] = 'Не указан';

        $model = self::find()->orderBy(['ord' => SORT_DESC])->all();

        foreach ($model as $item):

            $result[$item->id] = $item->header;

        endforeach;

        return $result ? $result : false;
    }

    public static function getRoot() {

        $model = self::find()->orderBy(['header' => SORT_ASC])->all();

        return $model ? $model : false;
    }

    public static function getByUrl($url) {

        return ($model = self::find()->where(['url' => $url]
                )->one()) ? $model : false;
    }

    public function getProducts() {

        return \app\modules\products\models\Product::findAll([
                    'category_id' => $this->id,
        ]);
    }

}
