<?php

use yii\bootstrap\Html;
?>

<div class="cart-top"  data-container=".wrap"
     data-html="true" data-title="ТОВАРЫ ДОБАВЛЕННЫЕ В КОРЗИНУ"
     data-toggle="popover" data-placement="bottom" data-content='<?= $content ?>'>
<!--    <span class="glyphicon glyphicon-shopping-cart">
</span>-->
    <?= Html::img('/image/ico/Cart.svg', ['class' => 'img', 'height' => '24px']) ?>

    <span style="<?php if($count == 0) echo 'display:none;'?>" class="count badge"><?= $count ?></span>
    <br>Корзина
</div>