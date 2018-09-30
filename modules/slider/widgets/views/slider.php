<?php

use yii\helpers\Html;
?>

<?php
$elements = [];

foreach ($model as $item):

    $elements[] = Html::img(null, ['class' => 'owl-lazy', 'data' => ['src' => $item->image]]);

endforeach;

echo \Gevman\OwlCarousel\OwlCarousel::widget([
    'elements' => $elements,
    'config' => [
        'items' => 1,
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