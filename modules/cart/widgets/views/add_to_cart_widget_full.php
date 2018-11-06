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
            <p class="price"><strong>Цена:</strong> <span class="cart__summ_one"><?= $model->showPrice ?></span></p>

            <div class="row">
                <div class="col-xs-6">
                    <button class="btn btn-grey" type="button" onclick="Cart.Minus(<?= $model->id ?>)">
                        <i class="fas fa-minus"></i>
                    </button>
                    <?= Html::textInput('product_id', $model->id, ['class' => 'hidden']) ?>
                    <?=
                    Html::textInput('count', 1, [
                        'class' => 'hidden form-control text-right count-' . $model->id,
                        'type' => 'number',
                    ])
                    ?>
                    <button class="btn btn-grey " type="button">
                        <strong class="btn-count-<?= $model->id ?>">1</strong>
                    </button>
                    <button class="btn btn-grey" type="button"  onclick="Cart.Plus(<?= $model->id ?>)">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="col-xs-6">
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
                <?= Html::button('Добавить в корзину', ['class' => 'btn btn-default']) ?>
                <?php ActiveForm::end(); ?>
                <?= \app\modules\forms\widgets\OneClickOrder::widget(['product_id' => $model->id]) ?>
            </div>

        </div>
    </div>
</div>



