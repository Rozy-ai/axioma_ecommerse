<?php

namespace app\modules\cart\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\cart\models\Cart;

class TopCartWidget extends Widget {

    public function run() {

        $data = Cart::_Products();


        $content = '';

//        print_r($data['models']);

        if (isset($data['models']) && $data['models'])
            foreach ($data['models'] as $model)
                $content .= $this->render('_one_top', ['model' => $model]);
        else
            $content = 'Корзина пуста';

//        return $this->render('top_cart_widget', ['count' => array_sum($data['counts'])]);
        return $this->render('top_cart_widget', [
                    'count' => count($data['counts']),
                    'content' => $content,
        ]);
    }

}
