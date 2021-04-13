<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
//use app\modules\forms\models;
use yii\helpers\Html;

class MarkirovkaOrderForm extends Widget {

    public function run() {

        $model = new \app\modules\forms\models\MarkirovkaOrder;

        return $this->render('markirovka_order_form', [
                    'model' => $model,
        ]);
    }

}
