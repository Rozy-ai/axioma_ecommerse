<?php

namespace app\modules\cart\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\catalog\models\Catalog;

class AddToCartWidget extends Widget {

    public $product_id;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Catalog::findOne($this->product_id);

        return $this->render('add_to_cart_widget', ['model' => $model]);
    }

}
