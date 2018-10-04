<?php

namespace app\modules\thanks\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\thanks\models\Thanks;

class ThanksList extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Thanks::find()->all();

        return $this->render('thanks_list', ['model' => $model]);
    }

}
