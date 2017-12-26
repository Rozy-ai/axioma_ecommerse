<?php

use yii\helpers\Html;
?>

<div class="row tb-header hidden-xs">
    <div class="col-sm-1">#</div>
    <div class="col-sm-2">Изображение</div>
    <div class="col-sm-2">Наименование</div>
    <div class="col-sm-2">Количество</div>
    <div class="col-sm-2">Цена за еденицу</div>
    <div class="col-sm-2">Сумма</div>
    <div class="col-sm-1"></div>
</div>



    <?php
    $summ = 0;

    if ($model)
        foreach ($model as $k => $item):
            echo $this->render('_cart_item', ['model' => $item, 'count' => $counts[$k]]);
            $summ += $item->price * $counts[$k];

        endforeach;
    else
        echo 'Корзина пуста';
    ?>

    <div class="row">
        <div class="col-xs-6 col-sm-9"><p class="pull-right"><strong>Общая сумма:</strong></p></div>
        <div class="col-xs-6 col-sm-2"><?= $summ ?></div>
        <div class="col-sm-1"></div>

    </div>


<?= Html::a('Оформить заказ', ['/order/default/view'], ['class' => 'btn btn-lg btn-primary pull-right ']) ?>
