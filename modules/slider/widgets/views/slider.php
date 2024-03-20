<?php

use yii\helpers\Html;
//use yii\bootstrap\Carousel;
use kv4nt\owlcarousel\OwlCarouselWidget;

?>

<!--<img class="img img-fluid" src="/image/slider/60d1e6a4f3fb0.jpg">-->

<?php
OwlCarouselWidget::begin([
    'container' => 'div',
    'containerOptions' => [
        //        'id' => 'container-id',
        'class' => 'lazy slider owl-theme hidden-xs'
    ],
    'pluginOptions' => [
        'autoplay' => true,
        //        'autoplay' => false,
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
    <a href="<?= $item->link ?>">
        <img class="img img-fluid" src="<?= $item->Img ?>" data-srcset="" data-sizes="" alt="slider_img">

        <div class="btn-wrap">
            <!-- <div class="container">
                <?php //echo !$item->link ?: Html::a($item->btnName, $item->link, ['class' => 'btn btn-primary']) ?>
            </div> -->  
        </div>
        </a>
    </div>
   
<?php endforeach; ?>


<?php OwlCarouselWidget::end(); ?>