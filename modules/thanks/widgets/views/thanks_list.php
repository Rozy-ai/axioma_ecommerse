<?php

use yii\helpers\Html;
use evgeniyrru\yii2slick\Slick;
use app\modules\portfolio\Asset;
?>
<div class="container">
    <p class="h2">Рекомендации наших клиентов</p>
<div class="home-thanks-list">
    <!-- <p class="h2">Нам доверяют</p> -->
    
    <!-- <div class="row">
        <?php // foreach ($model as $k => $item): ?>

            <div class="<?php // echo !$k ? 'col-xs-6 col-sm-6' : 'col-xs-6 col-sm-3' ?>">
                <a href="<?php //echo $item->img ?>" class="popup">
                    <?php //echo Html::img($item->img, ['class' => 'img img-responsive img-thumbnail']) ?>
                </a>
            </div>

        <?php // endforeach; ?>
    </div> -->
</div>

<?php
    $items = [];

foreach ($model as $k => $item):

    $items[] = $this->render('_item', ['item' => $item]);

endforeach;


//Yii::error($items);

echo Slick::widget([
// HTML tag for container. Div is default.
//    'itemContainer' => 'div',
    // HTML attributes for widget container
    'containerOptions' => ['class' => 'portfolio'],
    // Position for inclusion js-code
// see more here: http://www.yiiframework.com/doc-2.0/yii-web-view.html#registerJs()-detail
//    'jsPosition' => yii\web\View::POS_READY,
// Items for carousel. Empty array not allowed, exception will be throw, if empty 
    'items' => $items,
    // HTML attribute for every carousel item
//    'itemOptions' => ['class' => 'slider-item'],
    'clientOptions' => [
//        'speed' => 1000,
        'arrows' => false,
        'autoplay' => false,
        'dots' => true,
        'focusOnSelect' => false,
//        'prevArrow' => Html::img('/images/prev_arrow.png', ['class' => 'arr-left']),
//        'nextArrow' => Html::img('/images/next_arrow.png', ['class' => 'arr-right']),
//        'prevArrow' => Html::tag('div', '', ['class' => 'nav-arr nav-left']),
//        'nextArrow' => Html::tag('div', '', ['class' => 'nav-arr nav-right']),
//        'infinite' => false,
//        'centerMode' => true,
        'slidesToShow' => 3,
        'slidesToScroll' => 3,
//        'slidesToScroll' => count($items),
//        'centerPadding' => '0',
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
?>
    </div>

