<?php

namespace app\modules\slider\widgets;

use yii\base;
use yii\base\Widget;
use app\models\Slider;

class MainSlider extends Widget {

//            public $type;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Slider::find()->where(['act' => 1])->all();

        return $this->render('slider_2', ['model' => $model]);
    }

}
