<?php

namespace app\modules\category\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\category\models\Category;
use app\modules\fast_category\models\FastCategory;

class HomeCategory extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = FastCategory::getRoot();

//        print_r(count($model));

        return $this->render('home_category.twig', ['model' => $model]);
    }

}
