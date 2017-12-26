<?php

namespace app\modules\catalog\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\category\models\Category;

class HomeCatalog extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Category::getRoot();

        return $this->render('home_catalog', ['model' => $model]);
    }

}
