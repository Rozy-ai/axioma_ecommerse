<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
//use app\modules\forms\models;
use yii\helpers\Html;

class OneClickOrder extends Widget {

    public $product_id;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = new \app\modules\forms\models\OneClickOrder();

        $product = \app\modules\catalog\models\Catalog::findOne($this->product_id);

        return $this->render('one_click_order', [
                    'model' => $model,
                    'product' => $product,
        ]);
    }

}
