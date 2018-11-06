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
//        echo 12;
//        echo $this->product_id;
//        print_r($model);

        return $this->render('supported_goods', ['model' => $model]);
    }

}
