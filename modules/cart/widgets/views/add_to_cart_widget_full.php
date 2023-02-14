<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\editable\Editable;
use kartik\popover\PopoverX;
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

                    <div class="btn btn-grey" onclick="Cart.Minus(<?= $model->id ?>)">
                        <i class="fas fa-minus"></i>
                    </div>
<!--                    <button class="btn btn-grey" type="button" onclick="Cart.Minus(<?= $model->id ?>)">
                        <i class="fas fa-minus"></i>
                    </button>-->
                    <?= Html::textInput('product_id', $model->id, ['class' => 'hidden']) ?>
                    <?=
                    Html::textInput('count', $model->krat, [
                        'class' => 'text-center count-' . $model->id,
                        'type' => 'number',
                        "data-krat" => $model->krat,
                    ])
                    ?>

                    <?php
                    $content = Html::input('number', 'count-helper', $model->krat, ['class' => 'count-helper', 'attr-id' => $model->id]) .
                            Html::button('ОК', ['class' => 'count-helper-ok']);
                    ?>
                    <?php
                    PopoverX::widget([
                        'header' => 'Укажите количество',
                        'placement' => PopoverX::ALIGN_BOTTOM,
                        'content' => $content,
                        'footer' => Html::button('OK', ['class' => 'btn btn-sm btn-primary count-helper-ok']),
                        'toggleButton' => ['label' => ' <strong class="btn-count-' . $model->id . '">' . $model->krat . '</strong>', 'class' => 'btn btn-default btn-count-wrap'],
                    ]);
                    ?>
                    <!--                    <button class="btn btn-grey btn-count-wrap" type="button"
                                                data-container="body" data-toggle="popover-price" data-placement="top"
                                                data-html="true"
                                                data-content="<?= $content ?>">
                                            <strong lass="btn-count-<?= $model->id ?>"><?= $model->krat ?></strong>
                                        </button>-->
<!--                    <button class="btn btn-grey" type="button"  onclick="Cart.Plus(<?= $model->id ?>)">
                        <i class="fas fa-plus"></i>
                    </button>-->

                    <div class="btn btn-grey" onclick="Cart.Plus(<?= $model->id ?>)">
                        <i class="fas fa-plus"></i>
                    </div>

                </div>
                <!--                <div class="col-xs-6 hidden">
                                    <button class="btn btn-grey" type="button" onclick="Cart.Minus(<?= $model->id ?>)">
                                        <i class="far fa-heart"></i>
                                    </button>
                                    <button class="btn btn-grey" type="button"  onclick="Cart.Plus(<?= $model->id ?>)">
                                        <i class="fas fa-chart-bar"></i>
                                    </button>
                                </div>-->
            </div>

            <br/>

            <div class="" role="group">
                <?=
                Html::button('Добавить в корзину', ['class' => 'btn btn-primary',
                    'onclick' => "ym(53040199, 'reachGoal', 'add-cart'); Cart.AddCart()",
//                    'onclick' => "Cart.AddCart()",
                ])
                ?>
                <?php ActiveForm::end(); ?>
                <button type="button" class="btn btn-default"
                        onClick="ym(53040199,'reachGoal','one-click'); $('#oneclickorder-good').val($(this).attr('data-header'))"
                        data-id="<?= $model->id ?>" 
                        data-header="<?= $model->header ?>" 
                        data-toggle="modal" data-target="#oneclick-form-modal">Узнать цену</button>
                        <?= \app\modules\forms\widgets\OneClickOrder::widget() ?>
            </div>

        </div>
    </div>
</div>



