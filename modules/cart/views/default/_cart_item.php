<?php

use yii\helpers\Html;
use kartik\popover\PopoverX;

//echo $count;
?>
<div class="row tb-col">
    <div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-sm-1 img-wrap">
        <?=
        Html::img($model->getImage()
                , ['class' => 'img img-responsive img-thumbnail'
            , 'height' => '30px'])
        ?>
    </div>
    <div class="col-xs-12 col-sm-6 name-wrap">
        <strong class="hidden-sm hidden-md hidden-lg">Наименование: </strong>
        <?=
        Html::a($model->header, ['/catalog/' . $model->url]
                , ['class' => 'cart-item-title'])
        ?>
    </div>
<!--    <div class="col-xs-12 col-sm-2 summ-one-wrap">
        <strong class="hidden-sm hidden-md hidden-lg">Сумма за еденицу: </strong>
        <?= Yii::$app->formatter->asCurrency($model->price) ?>
    </div>-->
    <div class="col-xs-12 col-sm-3 count-wrap">
        <div class="input-group center-block">
            <button class="btn btn-grey" type="button" onclick="Cart.Minus(<?= $model->id ?>)">
                <i class="fas fa-minus"></i>
            </button>
            <?= Html::textInput('product_id', $model->id, ['class' => 'hidden']) ?>
            <?=
            Html::textInput('count', $count, [
                'class' => 'text-center count-' . $model->id,
                'type' => 'number',
                "data-krat" => $model->krat,
                'onChange' => 'Cart.Set(' . $model->id . ')'
            ])
            ?>


            <?php
            $content = Html::input('number', 'count-helper', $count, ['class' => 'count-helper count-helper-' . $model->id, 'attr-id' => $model->id]);
            ?>

            <?php
//             PopoverX::widget([
//                'id' => 'popover-x-' . $model->id,
//                'header' => 'Укажите количество',
//                'placement' => PopoverX::ALIGN_BOTTOM,
//                'content' => $content,
//                'footer' => Html::button('OK', ['class' => 'btn btn-sm btn-primary count-helper-ok']),
//                'toggleButton' => ['label' => ' <strong class="btn-count-' . $model->id . '">' . $count . '</strong>', 'class' => 'btn btn-default btn-count-wrap'],
//            ]);
            ?>

            </button>
            <button class="btn btn-grey" type="button"  onclick="Cart.Plus(<?= $model->id ?>)">
                <i class="fas fa-plus"></i>
            </button>
        </div>

        <?php if ($model->krat > 1): ?>
            <p class="text-muted text-left" style="font-size: 10px;">* кратность заказа - <?= $model->krat ?> </p>
        <?php endif;
        ?>
    </div>

<!--    <div class="col-xs-12 col-sm-2 summ-wrap">
        <strong class="hidden-sm hidden-md hidden-lg">Итого: </strong>
        <?= Yii::$app->formatter->asCurrency($model->price * $count) ?>
    </div>-->
    <div class="col-xs-12 col-sm-2 delete-wrap">
        <button class="cart-delete btn btn-default"
                onclick="Cart.Delete(<?= $model->id ?>)">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>
