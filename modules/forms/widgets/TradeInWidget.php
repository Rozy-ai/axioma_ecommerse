<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
use yii\helpers\Html;

class TradeInWidget extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = new \app\modules\forms\models\TradeInForm;

        return $this->render('trade_in', [
                    'model' => $model,
        ]);
    }

}
