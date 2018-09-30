<?php

use yii\bootstrap\Html;
?>

<div class="row">
    <div class="col-xs-4">
        <?= Html::a(Html::img($model->image, ['class' => 'img img-responsive']), ['/catalog/' . $model->url]) ?>
    </div>
    <div class="col-xs-8">
        <p class="h4">
            <?= Html::a($model->header, ['/catalog/' . $model->url]) ?>
        </p>
        <div class="col-xs-4">

        </div>
        <div class="col-xs-8">
            <?= Html::tag('p', $model->content_info) ?>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <strong>Цена:</strong> <?= $model->price ? '' . $model->price . ' <i class="fa fa-rub" aria-hidden="true"></i>' : ' по запросу'; ?>
            </div>
        </div>
        <div class="col-xs-12">
            <?= \app\modules\forms\widgets\OneClickOrder::widget(['product_id' => $model->id]) ?>
            <?= \app\modules\cart\widgets\AddToCartWidget::widget(['product_id' => $page->id]) ?>
        </div>
    </div>
</div>