<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
?>

<div class="col-xs-12 col-sm-4 product-cart product-cart-grid">

    <div class="panel">
        <div class="panel-heading">
            <div class=" image-wrap">
                <div class="image" data-url="<?= Url::to('/catalog/' . $model->url) ?>"
                     onclick="window.location = $(this).attr('data-url')"
                     style="background: url('<?= $model->image ?>') top center no-repeat;">

<!--                    <div class="gallery-popup-link-one" product-id="<?= $model->id ?>">
                        <i class="fas fa-search-plus"></i>
                    </div>-->
                </div>

            </div>

            <div class="product-description-wrap">
                <div class="h4">
                    <?= Html::a($model->header, ['/catalog/' . $model->url], ['class' => '']) ?>
                    <?php //  $model->ord?>
                </div>
                <div class="stock">
                    <?php if ($model->in_stock): ?>
                        <span class="in_stock"><i class="fa fa-check-circle" aria-hidden="true"></i> Товар в наличии </span>
                    <?php else: ?>
                        <span class="in_stock"><i class="fa fa-clock" aria-hidden="true"></i> Доступно под заказ</span>
                    <?php endif; ?>
                </div>
                <div class="product-price">
                    <span>ЦЕНА:</span> <?= $model->showPrice ?>
                </div>
            </div>

        </div>
        <div class="panel-footer">
            <?=
            \app\modules\cart\widgets\AddToCartWidget::widget([
                'product_id' => $model->id,
                'type' => 'small',
                'small' => true,
            ])
            ?>
        </div>


    </div>
</div>

<script type="text/javascript">

    var image_<?= $model->id ?> = '<?= $model->image ?>';

</script>