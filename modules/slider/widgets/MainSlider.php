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

        $model = Slider::find()->where(['act' => 1])
                ->orderBy(['ord' =>SORT_DESC])
                ->all();

        return $this->render('slider', ['model' => $model]);
    }

}
