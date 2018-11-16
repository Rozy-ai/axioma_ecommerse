<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="cart-add">
    <div class="row">
        <div class="col-xs-12">
            <?php ActiveForm::begin(['id' => 'add_cart']) ?>

            <?= Html::textInput('product_id', $model->id, ['class' => 'hidden']) ?>
            <div class="col-xs-12">
                <div class="btn-group pull-right" role="group">
                    <?= Html::button('В КОРЗИНУ', ['class' => 'btn btn-default', 'onclick' => 'Cart.OneAddCart(' . (string) $model->id . ')']) ?>
                    <?php ActiveForm::end(); ?>
                    <?= \app\modules\forms\widgets\OneClickOrder::widget(['product_id' => $model->id]) ?>
                </div>
            </div>
        </div>
    </div>
</div>



