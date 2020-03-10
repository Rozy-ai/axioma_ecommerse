<?php

namespace app\modules\products\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\products\models\Product;


class RecommendetWidget extends Widget {

    public $type;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Product::find()->where([
                            'show_in_recomended' => 1,
                            'product_type' => $this->type,
                        ])
                        ->orderBy('recomended_sort DESC')
                        ->limit(5)->all();

        return $this->render('recommendet', ['model' => $model]);
    }

}
