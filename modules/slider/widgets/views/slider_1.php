<?php

use yii\helpers\Html;
?>

<section class="lazy slider" data-sizes="50vw">

    <?php foreach ($model as $item): ?>
        <div>
            <img class="img img-responsive img-rounded" data-lazy="/<?= $item->image ?>" data-srcset="" data-sizes="100vw">
        </div>
    <?php endforeach; ?>

</section>