<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="cart-add">
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <?php ActiveForm::begin(['id' => 'add_cart']) ?>

            <p><strong>ИНФОРМАЦИЯ О ПРОДУКТЕ</strong></p>
            <p><?= $model->content_info ?></p>
            <p class="price"><strong>Цена:</strong> <span class="cart__summ_one"><?= $model->price ? $model->price : 'По запросу' ?></span></p>

            <div class="row">
                <div class="col-xs-6">
                    <button class="btn btn-default" type="button" onclick="Cart.Minus(<?= $model->id ?>)">-</button>
                    <?= Html::textInput('product_id', $model->id, ['class' => 'hidden']) ?>
                    <?php // Html::textInput('count', 1, ['class' => 'form-control text-right count-' . $model->id, 'type' => 'number']) ?>
                    <button class="btn btn-default" type="button"  onclick="Cart.Plus(<?= $model->id ?>)">1</button>
                    <button class="btn btn-default" type="button"  onclick="Cart.Plus(<?= $model->id ?>)">+</button>
                </div>
                <div class="col-xs-6">
                    <button class="btn btn-default" type="button" onclick="Cart.Minus(<?= $model->id ?>)">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-default" type="button"  onclick="Cart.Plus(<?= $model->id ?>)">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            <br/>

            <div class="" role="group">
                <?= Html::button('Добавить в корзину', ['class' => 'btn btn-primary', 'onclick' => "yaCounter23717086.reachGoal('addcart'); Cart.AddCart()"]) ?>
                <?php ActiveForm::end(); ?>
                <?= \app\modules\forms\widgets\OneClickOrder::widget(['product_id' => $model->id]) ?>
            </div>

        </div>
    </div>
</div>



