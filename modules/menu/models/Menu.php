<?php

namespace app\modules\menu\models;

use Yii;
use yii\bootstrap\Html;
use app\modules\category\models\Category;

class Menu extends \app\models\Menu {

    public $type = [
        'Верхнее меню',
        'Меню в футере 1',
        'Меню в футере 2',
        'Меню в футере 3',
    ];

    public static function getType() {

        $model = new self;
        return $model->type;
    }

    public static function getTopItems() {

        $model = self::find()->where([
                            'is_enable' => 1,
                            'menu_type' => 0,
                        ])
                        ->orderBy(['order' => SORT_DESC])->all();

        $result = [];

        $result['top'][] = ['label' => 'Главная', 'url' => ['/site/index']];

        $cat = Category::getRoot();

        foreach ($cat as $_item)
            $items[] = ['label' => $_item->header, 'url' => ['/category/' . $_item->url]];

        $result['top'][] = ['label' => '<i class="fa fa-bars" aria-hidden="true"></i> Каталог',
            'url' => ['/' . $_item->url],
            'items' => $items,
        ];

        foreach ($model as $item)
            $result['top'][] = ['label' => $item->name, 'url' => ['/' . $item->url]];

        $result['bottom'][] = ['label' => \app\modules\cart\widgets\TopCartWidget::widget(), 'url' => ['/cart'], 'options' => ['class' => 'cart-top-btn cart hidden-xs hidden-sm']];
        $result['bottom'][] = ['label' => \app\modules\cart\widgets\TopCartWidget::widget(), 'url' => ['/cart'], 'options' => ['class' => 'cart-mobile hidden-md hidden-lg']];
//        $result['bottom'][] = ['label' => '<i class="far fa-heart"></i>', 'url' => ['/favorite']];
//        $result['bottom'][] = ['label' => '<i class="fas fa-chart-bar"></i>', 'url' => ['/compare']];
        $result['bottom'][] = ['label' => '<i class="fas fa-lock"></i>', 'url' => [(Yii::$app->user->isGuest) ? '/enter' : '/products/admin/index']];

        return $result;
    }

    public static function getFooterItems($id) {

        $model = self::find()->where(['menu_type' => $id, 'is_enable' => 1])
                        ->orderBy(['order' => SORT_DESC])->all();

        $result = '';

        foreach ($model as $item):
            $result .= Html::tag('li', Html::a($item->name, ['/' . $item->url]));
        endforeach;

        return $result;
    }

}
