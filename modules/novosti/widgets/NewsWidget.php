<?php

namespace app\modules\novosti\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\novosti\models\News;

class NewsWidget extends Widget {

    public $ignore_id = 0;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = News::getLast($this->ignore_id);

        return $this->render('news_widget', ['model' => $model]);
    }

}
