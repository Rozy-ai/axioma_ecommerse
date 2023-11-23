<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="cart-add">
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
        <button type="button" class="btn btn-default" 
                style="font-size: 14px;"
                onClick="ym(53040199,'reachGoal','one-click'); $('#oneclickorder-good').val($(this).attr('data-header')); $('#oneclickorder-image').val($(this).attr('data-image'))"
                data-id="<?= $model->id ?>" 
                data-header="<?= $model->header ?>" 
                data-image="<?= Yii::$app->request->hostInfo.$model->image ?>" 
                data-toggle="modal" data-target="#oneclick-form-modal">Узнать цену</button>

    </div>
</div>

<style>
    #add_cart .btn {
        min-height: 38px;
    }
    </style>



