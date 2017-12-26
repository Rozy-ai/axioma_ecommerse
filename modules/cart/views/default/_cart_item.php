<?php

use yii\helpers\Html;
?>
<div class="row tb-col">
    <div class="col-xs-12 col-sm-1"></div>
    <div class="col-xs-12 col-sm-2"><?= $model->image ? Html::img($model->image, ['class' => 'img img-responsive']) : '' ?></div>
    <div class="col-xs-12 col-sm-2"><strong class="hidden-sm hidden-md hidden-lg">Наименование: </strong><?= Html::a($model->name, ['/catalog/' . $model->url]) ?></div>
    <div class="col-xs-6 col-sm-2">
        <div class="input-group">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" onclick="Cart.Minus(<?= $model->id ?>)">-</button>
            </span>

            <?= Html::textInput('product_id', $model->id, ['class' => 'hidden']) ?>
            <?= Html::textInput('count', $count, ['class' => 'form-control text-right count-' . $model->id, 'type' => 'number']) ?>
            <span class="input-group-btn">
                <button class="btn btn-default" type="button"  onclick="Cart.Plus(<?= $model->id ?>)">+</button>
            </span>
        </div></div>
    <div class="col-xs-12 col-sm-2"><strong class="hidden-sm hidden-md hidden-lg">Сумма за еденицу: </strong><?= $model->price ?></div>
    <div class="col-xs-12 col-sm-2"><strong class="hidden-sm hidden-md hidden-lg">Итого: </strong><?= $model->price * $count ?></div>
    <div class="col-xs-12 col-sm-1">
        <button class="cart-delete btn btn-danger" onclick="Cart.Delete(<?= $model->id ?>)">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
    </div>
</div>