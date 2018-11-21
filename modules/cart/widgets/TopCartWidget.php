<?php

namespace app\modules\cart\widgets;

use yii\base;
use yii\bootstrap\Html;
use yii\base\Widget;
use app\modules\cart\models\Cart;

class TopCartWidget extends Widget {

    public function run() {

        $data = Cart::_Products();

        $content = Html::a('<i class="fas fa-times"></i>', ['#']
                        , ['class' => 'close-btn']);


        if (isset($data['models']) && $data['models']) {
            foreach ($data['models'] as $k => $model)
                $content .= $this->render('@app/modules/cart/views/default/_one_top', [
                    'model' => $model,
                    'count' => $data['counts'][$k],
                ]);

            $content .= Html::a('К ЗАКАЗУ', ['/cart']
                            , ['class' => 'btn btn-primary center-block']);
        } else
            $content = 'Корзина пуста';

//        return $this->render('top_cart_widget', ['count' => array_sum($data['counts'])]);
        return $this->render('@app/modules/cart/views/default/top_cart_widget', [
                    'count' => count($data['counts']),
                    'content' => $content,
        ]);
    }

}
