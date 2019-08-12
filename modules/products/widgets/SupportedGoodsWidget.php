<?php

namespace app\modules\products\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\products\models\Product;

class SupportedGoodsWidget extends Widget {

    public $product_id;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Product::findOne($this->product_id);

        $models = Product::findAll(['id' => $model['supported_products'], 'is_enable' => 1]);
//        print_r($models);

        return $this->render('supported_goods', ['models' => $models]);
    }

}
