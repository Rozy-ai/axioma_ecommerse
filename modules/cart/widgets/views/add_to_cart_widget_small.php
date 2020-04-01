<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="cart-add">
    <div class="col-xs-12">
        <?php ActiveForm::begin(['id' => 'add_cart']) ?>

        <?= Html::textInput('product_id', $model->id, ['class' => 'hidden']) ?>
        <div class="btn-group pull-right" role="group">
            <?=
            Html::button('В КОРЗИНУ', ['class' => 'btn btn-primary',
                'onclick' => "ym(53040199, 'reachGoal', 'add-cart'); Cart.OneAddCart('$model->id')",
//                        'onclick' => "yaCounter53040199.reachGoal('add-cart');  Cart.OneAddCart('$model->id')",
//                        'onclick' => "Cart.OneAddCart('$model->id')",
            ])
            ?>
            <?php ActiveForm::end(); ?>
            <?= \app\modules\forms\widgets\OneClickOrder::widget(['product_id' => $model->id, 'type_small' => $small ? true : false]) ?>
        </div>
    </div>
</div>



