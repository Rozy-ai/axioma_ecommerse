<?php

namespace app\modules\cart\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\catalog\models\Catalog;
use app\modules\cart\CartAsset;

class CartWidget extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

//        $model = Catalog::getRootList();

        $model = [];

        $this->registerAssets();

        return $this->render('cart_widget', ['model' => $model]);
    }

    private function registerAssets() {
        $view = $this->getView();
        CartAsset::register($view);
    }

}
