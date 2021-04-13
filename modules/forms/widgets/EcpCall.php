<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
//use app\modules\forms\models;
use yii\helpers\Html;

class EcpCall extends Widget {

    public function run() {

        $model = new \app\modules\forms\models\CallEcpForm();

        return $this->render('ecp_call', [
                    'model' => $model,
        ]);
    }

}
