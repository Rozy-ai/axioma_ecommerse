<?php

use yii\bootstrap\Html;
?>

<div class="row product-cart">
    <div class="col-xs-4 image-wrap">
        <div class="image"
             style="background: url(<?= $model->image ?>) top center no-repeat;">

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
                <strong>Цена:</strong> <?= $model->showPrice ?>
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