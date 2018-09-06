<?php

namespace app\modules\uslugi\widgets;

use yii\base;
use yii\base\Widget;
use app\models\Slider;

class Menu extends Widget {

//            public $type;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Slider::find()->where(['act' => 1])->all();

        return $this->render('slider', ['model' => $model]);
    }

}
