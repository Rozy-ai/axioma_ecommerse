<?php

use yii\helpers\Html;

//echo $count;
?>
<div class="row tb-col">
    <div class="col-xs-12 col-sm-1 img-wrap">
        <?=
        Html::img($model->getImage()
                , ['class' => 'img img-responsive img-thumbnail'
            , 'height' => '30px'])
        ?>
    </div>
    <div class="col-xs-12 col-sm-4 name-wrap">
        <strong class="hidden-sm hidden-md hidden-lg">Наименование: </strong>
        <?=
        Html::a($model->header, ['/catalog/' . $model->url]
                , ['class' => 'cart-item-title'])
        ?>
    </div>
    <div class="col-xs-12 col-sm-2 summ-one-wrap">
        <strong class="hidden-sm hidden-md hidden-lg">Сумма за еденицу: </strong>
        <?= Yii::$app->formatter->asCurrency($model->price) ?>
    </div>
    <div class="col-xs-6 col-sm-2 count-wrap">
        <div class="input-group">
            <button class="btn btn-grey" type="button" onclick="Cart.Minus(<?= $model->id ?>)">
                <i class="fas fa-minus"></i>
            </button>
            <?= Html::textInput('product_id', $model->id, ['class' => 'hidden']) ?>
            <?=
            Html::textInput('count', $count, [
                'class' => 'hidden form-control text-right count-' . $model->id,
                'type' => 'number',
            ])
            ?>
            <button class="btn btn-grey " type="button">
                <strong class="btn-count-<?= $model->id ?>"><?= $count ?></strong>
            </button>
            <button class="btn btn-grey" type="button"  onclick="Cart.Plus(<?= $model->id ?>)">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>

    <div class="col-xs-12 col-sm-2 summ-wrap">
        <strong class="hidden-sm hidden-md hidden-lg">Итого: </strong>
        <?= Yii::$app->formatter->asCurrency($model->price * $count) ?>
    </div>
    <div class="col-xs-12 col-sm-1 delete-wrap">
        <button class="cart-delete btn btn-default"
                onclick="Cart.Delete(<?= $model->id ?>)">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>