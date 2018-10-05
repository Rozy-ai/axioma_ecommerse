<?php

namespace app\modules\search\widgets;

use yii\base;
use yii\base\Widget;

class Search extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        return $this->render('search');
    }

}
