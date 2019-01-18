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
        'class' => 'lazy slider owl-theme'
    ],
    'pluginOptions' => [
        'autoplay' => true,
        'autoplayTimeout' => 3000,
        'items' => 1,
        'loop' => true,
        'dots' => true,
        'nav' => true,
        'navText' => [Html::img('/image/_left.png'), Html::img('/image/_right.png')],
    ]
]);
?>
<?php foreach ($model as $item): ?>
    <div class="item-class">
        <img class="" src="<?= $item->image ?>" data-srcset="" data-sizes="" alt="slider_img">
    </div>
<?php endforeach; ?>


<?php OwlCarouselWidget::end(); ?>