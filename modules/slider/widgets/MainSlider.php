<?php

namespace app\modules\slider\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\slider\models\Slider;
use app\modules\slider\Assets;

class MainSlider extends Widget {

    public function run() {

        Assets::register($this->view);

        $model = Slider::find()->where(['act' => 1])
                ->orderBy(['ord' => SORT_DESC])
                ->all();

        return $this->render('slider', ['model' => $model]);
    }

}
