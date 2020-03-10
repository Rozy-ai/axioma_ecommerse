<?php

use yii\helpers\Html;
use yii\bootstrap\Carousel;
?>

<?php
$elements = [];

foreach ($model as $item):

    $elements[] = Html::img($item->image, ['class' => 'owl-lazy', 'data' => ['src' => $item->image]]);

endforeach;

//Yii::error($elements);

echo \Gevman\OwlCarousel\OwlCarousel::widget([
    'elements' => $elements,
    'config' => [
        'items' => 1,
        'itemsDesktop' => false,
        'itemsDesktopSmall' => false,
        'itemsTablet' => false,
        'itemsTabletSmall' => false,
        'itemsMobile' => false,
        'lazyLoad' => true,
        'loop' => true,
        'dots' => true,
        'nav' => true,
        'autoplay' => true,
    ]
]);
?>

<section class="lazy slider" data-sizes="50vw">

    <?php foreach ($model as $item): ?>
        <div>
            <img class="img img-responsive img-rounded" data-lazy="<?= $item->image ?>" data-srcset="" data-sizes="100vw">
        </div>
    <?php endforeach; ?>

</section>