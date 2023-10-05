<?php

use yii\bootstrap\Html;
?>

<div class="cart-top"  data-container=".wrap"
     data-html="true" data-title="ТОВАРЫ ДОБАВЛЕННЫЕ В КОРЗИНУ"
     data-toggle="popover" data-placement="bottom" data-content='<?= $content ?>'>
<!--    <span class="glyphicon glyphicon-shopping-cart">
</span>-->
    <?= Html::img('/image/ico/Cart.svg', ['class' => 'img', 'height' => '34px']) ?>
    <?php if($count !== 0): ?>
    <span class="count badge"><?= $count ?></span>
    <?php endif ?>
    <br>Корзина
</div>