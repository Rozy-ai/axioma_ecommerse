<?php

use yii\bootstrap\Html;
use evgeniyrru\yii2slick\Slick;
?>


<?php

$elements = [];

foreach ($images as $item):

    $elements[] = '<div class="item-wrap">' . Html::img(null, ['class' => 'owl-lazy',
                'data' => [
                    'src' => '/image/portfolio/' . $item,
//                    'header' => $item->name,
//                    'anons' => $item->anons,
        ]]) .
            '<div class="content-wrap">' .
//            Html::tag('div', $item->name, ['class' => 'p-header h2']) .
//            Html::tag('div', $item->anons, ['class' => 'p-anons']) .
            '</div>' .
            '</div>';

endforeach;

echo Slick::widget([
// HTML tag for container. Div is default.
    'itemContainer' => 'div',
    // HTML attributes for widget container
    'containerOptions' => ['class' => 'portfolio'],
    // Position for inclusion js-code
// see more here: http://www.yiiframework.com/doc-2.0/yii-web-view.html#registerJs()-detail
//    'jsPosition' => yii\web\View::POS_READY,
// Items for carousel. Empty array not allowed, exception will be throw, if empty 
    'items' => $elements,
    // HTML attribute for every carousel item
    'itemOptions' => ['class' => 'slider-item'],
    'clientOptions' => [
        'speed' => 1000,
        'arrows' => true,
        'autoplay' => false,
        'dots' => false,
//        'focusOnSelect' => true,
        'prevArrow' => Html::img('/images/prev_arrow.png', ['class' => 'arr-left']),
        'nextArrow' => Html::img('/images/next_arrow.png', ['class' => 'arr-right']),
        'infinite' => false,
//        'centerMode' => true,
        'slidesToShow' => 3,
        'slidesToScroll' => 1,
//        'slidesToScroll' => count($items),
        'centerPadding' => '0',
        'swipe' => true,
        'responsive' => [
            ['breakpoint' => 1024,
                'settings' => [
                    'slidesToShow' => 2,
                    'slidesToScroll' => 2,
                ]
            ],
            ['breakpoint' => 648,
                'settings' => [
                    'slidesToShow' => 1,
                    'slidesToScroll' => 1,
                ]
            ],
        ],
    // note, that for params passing function you should use JsExpression object
// but pay atention, In slick 1.4, callback methods have been deprecated and replaced with events.
//        'onInit' => new JsExpression('function() {console.log("The cat has shown")}'),
    ],
]);


echo \Gevman\OwlCarousel\OwlCarousel::widget([
    'elements' => $elements,
    'config' => [
        'items' => 3,
        'center' => true,
        'lazyLoad' => true,
        'loop' => true,
        'dots' => true,
        'nav' => true,
        'autoplay' => true,
        'navText' => [
            Html::tag('div', '', ['class' => 'nav-arr nav-left']),
            Html::tag('div', '', ['class' => 'nav-arr nav-right'])
        ]
    ,
    ]
]);
?>

