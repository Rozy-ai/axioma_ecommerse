<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
?>

<div class="row product-cart">
    <div class="col-xs-12 col-md-4 image-wrap">
        <?php if ($model->is_akustika && !$model->is_radio) : ?>

            <?= Html::img('/image/t-am.svg', ['class' => 'type-img']) ?>

        <?php endif; ?>

        <?php if ($model->is_radio && !$model->is_akustika) : ?>

            <?= Html::img('/image/t-rc.svg', ['class' => 'type-img']) ?>

        <?php endif; ?>

        <?php if ($model->is_radio && $model->is_akustika) : ?>

            <?= Html::img('/image/t-all.svg', ['class' => 'type-img']) ?>

        <?php endif; ?>
        <div class="image" data-url="<?= Url::to('/catalog/' . $model->url) ?>" onclick="window.location = $(this).attr('data-url')" style="background: url('<?= $model->image ?>') top center no-repeat;">

            <div class="gallery-popup-link-one" product-id="<?= $model->id ?>">
                <i class="fas fa-search-plus"></i>
            </div>
        </div>

    </div>

    <div class="col-xs-12 col-md-8">
        <div class="product-description-wrap">
            <div class="h4">
                <?= Html::a($model->header, ['/catalog/' . $model->url]) ?>
                <?php //  $model->ord
                ?>
            </div>
            <div class="description">
                <?= Html::tag('p', $model->content_info) ?>
            </div>
            <div class="product-price">
                <div class="pull-right"><span>Цена:</span> <?= $model->showPrice ?></div>
                <?php if ($model->in_stock) : ?>
                    <span class="in_stock"><i class="fa fa-check-circle" aria-hidden="true"></i> Товар в наличии </span>
                <?php else : ?>
                    <span class="in_stock"><i class="fa fa-clock" aria-hidden="true"></i> Доступно под заказ</span>
                <?php endif; ?>
                <div>
                    <?=
                    \app\modules\cart\widgets\AddToCartWidget::widget([
                        'product_id' => $model->id,
                        'type' => 'small',
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var image_<?= $model->id ?> = '<?= $model->image ?>';
</script>