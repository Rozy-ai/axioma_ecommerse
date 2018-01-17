<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="cart-add">
    <div class="row">
        <div class="col-xs-11 col-xs-offset-1">
            <?php ActiveForm::begin(['id' => 'add_cart']) ?>

            <p><strong><?= $model->name ?></strong></p>

            <div class="col-xs-12">
                <div class="input-group col-xs-8">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="Cart.Minus(<?= $model->id ?>)">-</button>
                    </span>

                    <?= Html::textInput('product_id', $model->id, ['class' => 'hidden']) ?>

                    <?= Html::textInput('count', 1, ['class' => 'form-control text-right count-' . $model->id, 'type' => 'number']) ?>

                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"  onclick="Cart.Plus(<?= $model->id ?>)">+</button>
                    </span>
                </div>
            </div>

            <br/>
            <p class="price"><strong>Цена:</strong> <span class="cart__summ_one"><?= $model->price ? $model->price : 'По запросу' ?></span></p>
            <p class="price"><strong>Итого:</strong> <span class="cart__summ_all"><?= $model->price ?></span></p>

            <?= $model->price ? '' : '<p>После оформления заказа с вами свяжется менеджер.</p>' ?>
            <div class="btn-group" role="group">
                <?= Html::button('Добавить в корзину', ['class' => 'btn btn-primary', 'onclick' => 'Cart.AddCart()']) ?>
                <?php ActiveForm::end(); ?>
                <?= \app\modules\forms\widgets\OneClickOrder::widget(['product_id' => $model->id]) ?>
            </div>

        </div>
    </div>
</div>



