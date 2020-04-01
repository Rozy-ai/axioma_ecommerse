<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
?>

<div class="row product-cart">
    <div class="col-xs-4 image-wrap">
        <div class="image" data-url="<?= Url::to('/catalog/' . $model->url) ?>"
             onclick="window.location = $(this).attr('data-url')"
             style="background: url('<?= $model->image ?>') top center no-repeat;">

            <div class="gallery-popup-link-one" product-id="<?= $model->id ?>">
                <i class="fas fa-search-plus"></i>
            </div>
        </div>

    </div>

    <div class="col-xs-8">
        <div class="product-description-wrap">
            <div class="h4">
                <?= Html::a($model->header, ['/catalog/' . $model->url]) ?>
                <?php //  $model->ord?>
            </div>
            <div class="description">
                <?= Html::tag('p', $model->content_info) ?>
            </div>
            <div class="product-price">
                <span>Цена:</span> <?= $model->showPrice ?>
                <?php if ($model->in_stock): ?>
                    <span class="in_stock pull-right"><i class="fa fa-check-circle" aria-hidden="true"></i> Товар в наличии </span>
                <?php else: ?>
                    <span class="in_stock pull-right"><i class="fa fa-clock" aria-hidden="true"></i> Доступно под заказ</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div>
        <?=
        \app\modules\cart\widgets\AddToCartWidget::widget([
            'product_id' => $model->id,
            'type' => 'small',
        ])
        ?>
    </div>
</div>

<script type="text/javascript">

    var image_<?= $model->id ?> = '<?= $model->image ?>';

</script>