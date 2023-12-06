<?php

use yii\bootstrap\Html;
?>

<div class="cart-top"  data-container=".wrap"
     data-html="true" data-title="ТОВАРЫ ДОБАВЛЕННЫЕ В ИЗБРАННОЕ"
     data-toggle="popover" data-placement="bottom" data-content='<?= $content ?>'>
<!--    <span class="glyphicon glyphicon-shopping-cart">
</span>-->
    <?= Html::img('/image/ico/Избранное.svg', ['class' => 'img', 'height' => '24px']) ?>

    <br>Избранное
</div>