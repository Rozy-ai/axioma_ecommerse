<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="cart-add">
    <div class="row">
        <div class="col-xs-12">
            <?php ActiveForm::begin(['id' => 'add_cart']) ?>

            <div class="col-xs-12">
                <div class="input-group col-xs-8">
                    <?= Html::textInput('product_id', $model->id, ['class' => 'hidden']) ?>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="btn-group pull-right" role="group">
                    <?= Html::button('В КОРЗИНУ', ['class' => 'btn btn-default']) ?>
                    <?php ActiveForm::end(); ?>
                    <?= \app\modules\forms\widgets\OneClickOrder::widget(['product_id' => $model->id]) ?>
                </div>
            </div>
        </div>
    </div>
</div>



