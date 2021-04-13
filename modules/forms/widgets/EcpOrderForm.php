<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
//use app\modules\forms\models;
use yii\helpers\Html;

class EcpOrderForm extends Widget {

    public function run() {

        $model = new \app\modules\forms\models\EcpOrder;

        return $this->render('ecp_order_form', [
                    'model' => $model,
        ]);
    }

}
