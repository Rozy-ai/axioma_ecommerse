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
            <p class="price">Цена: <strong><span class="cart__summ_one"><?= $model->showPrice ?></span></strong>
                <?php if ($model->in_stock): ?>
                    <span class="pull-right in_stock">в наличии <i class="fa fa-check-square" aria-hidden="true"></i></span>
                <?php else: ?>
                    <span class="pull-right in_stock">под заказ <i style="color: black" class="fas fa-mobile-alt"></i></span>
                <?php endif; ?>
            </p>

            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-grey" type="button" onclick="Cart.Minus(<?= $model->id ?>)">
                        <i class="fas fa-minus"></i>
                    </button>
                    <?= Html::textInput('product_id', $model->id, ['class' => 'hidden']) ?>
                    <?=
                    Html::textInput('count', $model->krat, [
                        'class' => 'hidden form-control text-right count-' . $model->id,
                        'type' => 'number',
                        "data-krat" => $model->krat,
                    ])
                    ?>
                    <button class="btn btn-grey btn-count-wrap" type="button"
                            data-container="body" data-toggle="popover" data-placement="top"
                            data-html="true"
                            data-content='<?= Html::input('number', 'count-helper', $model->krat, ['class' => 'count-helper', 'attr-id' => $model->id]); ?>
                            <?= Html::button('ОК', ['class' => 'count-helper-ok']) ?>'>
                        <strong class="btn-count-<?= $model->id ?>"><?= $model->krat ?></strong>
                    </button>
                    <button class="btn btn-grey" type="button"  onclick="Cart.Plus(<?= $model->id ?>)">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="col-xs-6 hidden">
                    <button class="btn btn-grey" type="button" onclick="Cart.Minus(<?= $model->id ?>)">
                        <i class="far fa-heart"></i>
                    </button>
                    <button class="btn btn-grey" type="button"  onclick="Cart.Plus(<?= $model->id ?>)">
                        <i class="fas fa-chart-bar"></i>
                    </button>
                </div>
            </div>

            <br/>

            <div class="" role="group">
                <?=
                Html::button('Добавить в корзину', ['class' => 'btn btn-default',
                    'onclick' => "ym(53040199, 'reachGoal', 'add-cart'); Cart.AddCart()",
//                    'onclick' => "Cart.AddCart()",
                ])
                ?>
                <?php ActiveForm::end(); ?>
                <?= \app\modules\forms\widgets\OneClickOrder::widget(['product_id' => $model->id]) ?>
            </div>

        </div>
    </div>
</div>



