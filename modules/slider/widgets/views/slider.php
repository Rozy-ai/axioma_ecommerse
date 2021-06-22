<?php

use yii\helpers\Html;
//use yii\bootstrap\Carousel;
use kv4nt\owlcarousel\OwlCarouselWidget;
?>

<?php
OwlCarouselWidget::begin([
    'container' => 'div',
    'containerOptions' => [
//        'id' => 'container-id',
        'class' => 'lazy slider owl-theme hidden-xs'
    ],
    'pluginOptions' => [
        'autoplay' => true,
        'autoplayTimeout' => 8000,
        'autoplayHoverPause' => true,
        'items' => 1,
        'loop' => true,
        'dots' => true,
        'nav' => true,
        'navSpeed' => 1000,
//        'navText' => [Html::img('/image/_left.png'), Html::img('/image/_right.png')],
        'navText' => [Html::tag('div', '', ['class' => 'nav-arr nav-left']), Html::tag('div', '', ['class' => 'nav-arr nav-right'])],
//        'animateOut' => 'fadeOut',
//        'animateIn' => 'fadeIn',
//        'animateOut' => 'slideOutLeft',
//        'animateIn' => 'slideInRight',
    ]
]);
?>
<?php foreach ($model as $item): ?>
    <div class="item-class">
        <img class="img img-fluid" src="<?= $item->Img ?>" data-srcset="" data-sizes="" alt="slider_img">

        <div class="btn-wrap">
            <div class="container">
                <?= Html::a('В каталог', $item->link, ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php OwlCarouselWidget::end(); ?>
