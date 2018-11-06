<?php

use yii\bootstrap\Html;
?>

<div class="row product-cart">
    <div class="col-xs-4 image-wrap">
        <div class="image"
             style="background: url(<?= $model->image ?>) top center no-repeat;">
        </div>
    </div>
    <div class="col-xs-8">
        <div class="product-description-wrap">
            <p class="h4">
                <?= Html::a($model->header, ['/catalog/' . $model->url]) ?>
            </p>
            <p>
                <?= Html::tag('p', $model->content_info) ?>
            </p>
            <div class="product-price">
                <strong>Цена:</strong> <?= $model->showPrice ?>
            </div>
        </div>
    </div>
    <div>
        <?=
        \app\modules\cart\widgets\AddToCartWidget::widget([
            'product_id' => $page->id,
            'type' => 'small',
        ])
        ?>
    </div>
</div>