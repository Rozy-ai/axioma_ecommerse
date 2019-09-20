<?php

use yii\helpers\Html;
?>

<div class="row tb-header hidden-xs">
    <div class="col-sm-1"></div>
    <div class="col-sm-4 text-center">ТОВАР</div>
    <div class="col-sm-2 text-center">ЦЕНА</div>
    <div class="col-sm-2 text-center">КОЛИЧЕСТВО</div>
    <div class="col-sm-2 text-center">ИТОГО</div>
    <div class="col-sm-1"></div>
</div>



<?php
$summ = 0;

//print_r($model);

if ($model)
    foreach ($model as $k => $item):
        echo $this->render('_cart_item'
                , ['model' => $item, 'count' => $counts[$k]]);
        $summ += $item->price * $counts[$k];

    endforeach;
else
    echo 'Корзина пуста';
?>

<div class="row bottom-row">
    <div class="col-xs-6 col-sm-10">
        <p class="full-summ"><strong>Итоговая сумма:</strong></p>
    </div>
    <div class="col-xs-6 col-sm-2 text-right bottom-summ">
        <?= Yii::$app->formatter->asCurrency($summ) ?>
    </div>

</div>

<div class="row">
    <?= Html::a('Оформить заказ', ['/order/default/view'], [
        'class' => 'btn btn-lg btn-primary pull-right',
        'onclick' => "ym(53040199, 'reachGoal', 'send-order')",
        ]) ?>
</div>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })

</script>