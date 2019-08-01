<?php

namespace app\modules\novosti\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\novosti\models\News;

class HomeWidget extends Widget {

    public $ignore_id = 0;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = News::getLast();

        return $this->render('home_widget', ['model' => $model]);
    }

}
