<?php

use yii\bootstrap\Html;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="cart-index">
    <!--<h1>Корзина</h1>-->
    <div class="row">
        <div class="col-xs-12">
            <?= Html::img('/image/cart-box.jpg', ['class' => 'pull-right']) ?>
        </div>
    </div>
    <div class="cart-index-wrap"></div>

</div>

<script type="text/javascript">

    var cart = true;

</script>