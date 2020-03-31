<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
?>

<div class="col-xs-12 col-sm-4 product-cart">

    <div class="panel panel-default">
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
                    <?= Html::a($model->header, ['/catalog/' . $model->url]) ?>
                    <?php //  $model->ord?>
                </div>
                <div class="description">
                    <?= Html::tag('p', $model->content_info) ?>
                </div>
                <div class="product-price">
                    <span>Цена:</span> <?= $model->showPrice ?>
                    <?php if ($model->in_stock): ?>
                        <span class="pull-right in_stock">в наличии <i class="fa fa-check-square" aria-hidden="true"></i></span>
                    <?php else: ?>
                        <span class="pull-right in_stock">под заказ <i style="color: black" class="fas fa-mobile-alt"></i></span>
                    <?php endif; ?>
                </div>
            </div>

        </div>
        <div class="panel-footer">
            <?=
            \app\modules\cart\widgets\AddToCartWidget::widget([
                'product_id' => $model->id,
                'type' => 'small',
            ])
            ?>
        </div>


    </div>
</div>

<script type="text/javascript">

    var image_<?= $model->id ?> = '<?= $model->image ?>';

</script>