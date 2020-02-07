<?php

namespace app\modules\category\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\category\models\Category;

class HomeCategory extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Category::getRootHome();

//        print_r(count($model));

        return $this->render('home_category', ['model' => $model]);
    }

}
