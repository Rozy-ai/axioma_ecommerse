<?php

namespace app\modules\menu\models;

use Yii;
use yii\bootstrap\Html;
use app\modules\category\models\Category;
use yii\helpers\ArrayHelper;

class Menu extends \app\models\Menu {

    public $type = [
        'Верхнее меню',
        'Меню в футере 1',
        'Меню в футере 2',
        'Меню в футере 3',
        'Быcтрые категории',
    ];

    public static function getType() {

        $model = new self;
        return $model->type;
    }

    public static function getTopItems() {

        $model = self::find()->where([
                            'is_enable' => 1,
                            'menu_type' => 0,
                            'parent_id' => [0, NULL],
                        ])
                        ->orderBy(['order' => SORT_DESC])->all();

//        $result = [];

    //    $result['top'][] = ['label' => 'О компании', 'url' => ['/site/index']];
//         $result['top'][] = ['label' => 'Каталог', 'url' => ['/catalog'],
// //            'items' => $items,
//         ];

        foreach ($model as $item)
            if ($item->childs) {

//                Yii::error($item->childs);

                $items = [];

                foreach ($item->childs as $child)
                    if (isset($child->name))
                        $items[] = ['label' => $child->name, 'url' => ['/' . $child->url]];

                $result['top'][] = ['label' => $item->name, 'items' => $items];
            } else
                $result['top'][] = ['label' => $item->name, 'url' => ['/' . $item->url]];

        // $result['bottom'][] = ['label' => '<img onClick="$(\'#popup-search\').submit()" class="search-image" src="/image/ico/Search.svg">', 'options' => ['class' => 'search-link']];
      //  $result['bottom'][] = ['label' => '<img class="img" id="favorite" style="height:24px" src="/image/ico/Избранное.svg"> <br>Избранное', 'url' => ['/favorite']];
        $result['bottom'][] = ['label' => \app\modules\cart\widgets\TopFavoriteWidget::widget(), 'url' => ['/favorite'], 'options' => ['class' => 'cart-top-btn favorite']];
        // $result['bottom'][] = ['label' => '<img class="img" style="height:24px" src="/image/ico/Сравнение.svg"> <br>Сравнение', 'url' => ['/compare']];
        $result['bottom'][] = ['label' => \app\modules\cart\widgets\TopCartWidget::widget(), 'url' => ['/cart'], 'options' => ['class' => 'cart-top-btn cart hidden-xs hidden-sm']];
        $result['bottom'][] = ['label' => \app\modules\cart\widgets\TopCartWidget::widget(), 'url' => ['/cart'], 'options' => ['class' => 'cart-mobile hidden-md hidden-lg']];
        $result['bottom'][] = ['label' => '<img class="img" style="height:24px" onmouseover="this.src=\'/image/ico/User.svg\'" onmouseout="this.src=\'/image/ico/Войти.svg\'" src="/image/ico/Войти.svg"> <br>Войти', 'url' => [(Yii::$app->user->isGuest) ? '/enter' : '/products/admin/index'], 'options' => ['class' => 'enter-link']];

        return $result;
    }

    public static function getBottomMenu() {

        $model = self::find()->where([
                            'is_enable' => 1,
                            'menu_type' => 4,
                            'parent_id' => NULL,
                        ])
//                        ->andWhere(['NOT', ['parent_id' => 1,]])
                        ->orderBy(['order' => SORT_DESC])->all();

        ;

        foreach ($model as $item)
            if (($childs = self::find()->where(['parent_id' => $item->id, 'is_enable' => 1])->all())) {

                $_items = [];

                foreach ($childs as $_child)
                    $_items[] = ['label' => $_child->name, 'url' => ['/' . $_child->url]];

                $result[] = ['label' => $item->name, 'url' => ['/' . $item->url], 'items' => $_items];
            } else
                $result[] = ['label' => $item->name, 'url' => [ $item->url]];
 

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

    public static function __parentList() {

        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    public function getChilds() {
        return $this->hasMany(self::className(), ['parent_id' => 'id']);
    }

}
