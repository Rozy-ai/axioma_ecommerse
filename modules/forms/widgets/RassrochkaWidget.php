<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
use yii\helpers\Html;

class RassrochkaWidget extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = new \app\modules\forms\models\RassrochkaForm;

        return $this->render('rassrochka_form', [
                    'model' => $model,
        ]);
    }

}
