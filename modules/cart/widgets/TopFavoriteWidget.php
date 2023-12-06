<?php

namespace app\modules\cart\widgets;

use yii\base;
use yii\bootstrap\Html;
use yii\base\Widget;
use app\modules\cart\models\Favorite;

class TopFavoriteWidget extends Widget {

    public function run() {

        $data = Favorite::_Products();

        $content = Html::a('<i class="fas fa-times"></i>', ['#']
                        , ['class' => 'close-btn']);


        if (isset($data['models']) && $data['models']) {
            foreach ($data['models'] as $k => $model)
                $content .= $this->render('@app/modules/cart/views/default/_one_favorite_top', [
                    'model' => $model,
                ]);

            $content .= Html::a('Избранное', ['/favorite']
                            , ['class' => 'btn btn-primary center-block']);
        } else
            $content = 'Избранное пуста';


        return $this->render('@app/modules/cart/views/default/top_favorite_cart_widget', [
                    'content' => $content,
        ]);
    }

}
