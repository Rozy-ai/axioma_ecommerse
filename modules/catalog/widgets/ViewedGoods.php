<?php

namespace app\modules\catalog\widgets;

use Yii;
use yii\base;
use yii\base\Widget;
use app\modules\catalog\models\Catalog;

class ViewedGoods extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = [];

        $session = Yii::$app->session;
        $data = $session['viewed'];

        if (is_array($data))
            foreach ($data as $item):
                $model [] = Catalog::findOne($item);
            endforeach;



        return $this->render('viewed_goods', ['model' => $model]);
    }

}
