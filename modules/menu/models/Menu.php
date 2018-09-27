<?php

namespace app\modules\menu\models;

use Yii;
use yii\bootstrap\Html;
use app\modules\category\models\Category;

class Menu extends \app\models\Menu {

    const TOP_ID = 1;
    const FOOTER_ID = 54;

    public static function getTopItems() {

        $model = self::find()->where(['parent_id' => self::TOP_ID, 'act' => 1])
                        ->orderBy(['ord' => SORT_ASC])->all();

        $result = [];

        $result['top'][] = ['label' => 'Главная', 'url' => ['/site/index']];

        foreach ($model as $item):
            if ($item->url == 'catalog/default/index') {


//                $items[] = ['label' => 'Категории', 'url' => ['/' . $item->url]];

                $model = Category::getRoot();

                foreach ($model as $_item)
                    $items[] = ['label' => $_item->header, 'url' => ['/category/' . $_item->url]];

                $result['top'][] = ['label' => '<i class="fa fa-bars" aria-hidden="true"></i> ' . $item->name,
                    'url' => ['/' . $item->url],
                    'items' => $items,
                ];
            } else
                $result['top'][] = ['label' => $item->name, 'url' => ['/' . $item->url]];
        endforeach;

        $result['bottom'][] = ['label' => '<span class="glyphicon glyphicon-shopping-cart"></span>', 'url' => ['/cart']];

        return $result;
    }

    public static function getFooterItems() {

        $model = self::find()->where(['parent_id' => self::FOOTER_ID, 'act' => 1])
                        ->orderBy(['ord' => SORT_ASC])->all();

        $result = '';

        foreach ($model as $item):

            $result .= Html::tag('li', Html::a($item->name, ['/' . $item->url]));
        endforeach;

        return $result;
    }

}
