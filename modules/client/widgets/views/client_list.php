<?php

use yii\helpers\Html;
?>
<div class="container content trust">
    <div class="row">
        <div class="h2">Марки и бренды</div>

        <div class="owl-carousel owl-theme owl-carousel-1">

            <?php foreach ($brands as $brand): ?>
                <div class="item">
                    <div class="brand">
                        <img class="img" src="<?= $brand['url'] ?>" alt="<?= $brand['name'] ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
