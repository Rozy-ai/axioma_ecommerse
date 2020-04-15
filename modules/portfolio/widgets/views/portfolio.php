<?php

use yii\bootstrap\Html;
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

