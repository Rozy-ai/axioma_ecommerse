<?php

use yii\bootstrap\Html;
use yii\helpers\Url;

$this->registerJsFile('/js/product-cart-height.js', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 product-cart product-cart-grid">

    <div class="panel">
        <div class="panel-heading">

            <?php if ($model->is_akustika && !$model->is_radio) : ?>

                <?= Html::img('/image/t-am.svg', ['class' => 'type-img']) ?>

            <?php endif; ?>

            <?php if ($model->is_radio && !$model->is_akustika) : ?>

                <?= Html::img('/image/t-rc.svg', ['class' => 'type-img']) ?>

            <?php endif; ?>

            <?php if ($model->is_radio && $model->is_akustika) : ?>

                <?= Html::img('/image/t-all.svg', ['class' => 'type-img']) ?>

            <?php endif; ?>
            <a href="#" onclick="Cart.Favorite(<?= $model->id ?>)"><?= Html::img('/image/ico/Избранное.svg', ['class' => 'favorite-img']) ?></a>
            <a href="#" onclick="Cart.Compare(<?= $model->id ?>)"><?= Html::img('/image/ico/Сравнение.svg', ['class' => 'comparison-img']) ?></a>
            <div class=" image-wrap">
                <div class="image" data-url="<?= Url::to('/catalog/' . $model->url) ?>" onclick="window.location = $(this).attr('data-url')" style="background: url('<?= $model->image ?>') top center no-repeat;">

                    <!--                    <div class="gallery-popup-link-one" product-id="<?= $model->id ?>">
                        <i class="fas fa-search-plus"></i>
                    </div>-->
                </div>

            </div>

            <!--<div class="product-description-wrap">-->
            <div class="h4">
                <?=
                Html::a(
                    $model->short_name ? $model->short_name : $model->header,
                    ['/catalog/' . $model->url],
                    [
                        'class' => 'text-grid',
                        'title' => $model->header,
                    ]
                )
                ?>
                <?php //  $model->ord 
                ?>
            </div>
            <!-- <div class="product-anons">
                <?php // echo $model->anons 
                ?>
            </div> -->

        </div>
        <div class="panel-body">
            <div class="stock">
                <?php if ($model->in_stock) : ?>
                    <span class="in_stock"><i class="fa fa-check-circle" aria-hidden="true"></i> Товар в наличии </span>
                <?php else : ?>
                    <span class="in_stock"><i class="fa fa-clock" aria-hidden="true"></i> Доступно под заказ</span>
                <?php endif; ?>
            </div>
            <div class="product-price">
                <span>ЦЕНА:</span> <?= $model->showPrice ?>
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
    <div class="characteristics-compare">
        <div class="h2">
            Характеристики
        </div>
        <?= $model->content_characteristics ?>
    </div>
</div>

<script type="text/javascript">
    var image_<?= $model->id ?> = '<?= $model->image ?>';
</script>