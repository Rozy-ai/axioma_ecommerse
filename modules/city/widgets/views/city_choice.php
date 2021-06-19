<?php

use yii\helpers\Html;

echo $current;
?>

<div class="city-choise">
    <ul class="list-inline">
        <?php foreach ($links as $k => $link): ?>
            <li class="list-inline-item">
                <?= $link['link']; ?>
            </li>
        <?php endforeach; ?>
</div>


