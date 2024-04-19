<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use kv4nt\owlcarousel\OwlCarouselWidget;

$this->registerJsFile('/js/product-cart-height.js', ['depends' => ['app\assets\AppAsset']]);

$words = explode(" ", $model->short_name);
// $firstWord = $words[0] . ' ' .$words[1];
$firstWord = $words[0];
$otherWords =  implode(" ", array_slice($words, 1));

?>

<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 product-cart product-cart-grid">

    <div class="panel">
        <div class="panel-heading">

            <?php if ($model->is_akustika && !$model->is_radio): ?>

                <?= Html::img('/image/t-am.svg', ['class' => 'type-img']) ?>

            <?php endif; ?>

            <?php if ($model->is_radio && !$model->is_akustika): ?>

                <?= Html::img('/image/t-rc.svg', ['class' => 'type-img']) ?>

            <?php endif; ?>

            <?php if ($model->is_radio && $model->is_akustika): ?>

                <?= Html::img('/image/t-all.svg', ['class' => 'type-img']) ?>

            <?php endif; ?>
   
            <?php 
    if(isset(Yii::$app->session['favorite'])) {$data = array_unique(Yii::$app->session['favorite']);
        if(in_array($model->id, $data)) $imgPath = '/image/ico/Избранное(зеленый).svg';
         else {$imgPath = '/image/ico/Избранное.svg';}
        } else {$imgPath = '/image/ico/Избранное.svg';}
?>
<a href="#" onclick="Cart.Favorite(this, <?= $model->id ?>)"><?= Html::img($imgPath, ['class' => 'favorite-img']) ?></a>

            <!-- <a href="#" onclick="Cart.Compare(<?= $model->id ?>)"><?= Html::img('/image/ico/Сравнение.svg', ['class' => 'comparison-img']) ?></a> -->
            <div class=" image-wrap">
            <div class="image" data-url="<?= Url::to('/catalog/' . $model->url) ?>">
            <?php
OwlCarouselWidget::begin([
    'container' => 'div',
    'containerOptions' => [
        //        'id' => 'container-id',
        'class' => 'lazy slider owl-theme'
    ],
    'pluginOptions' => [
        'autoplay' => false,
        //        'autoplay' => false,
        'autoplayTimeout' => 8000,
        'autoplayHoverPause' => true,
        'items' => 1,
        'loop' => true,
        'dots' => true,
        'nav' => false,
        'navSpeed' => 1000,
        //        'navText' => [Html::img('/image/_left.png'), Html::img('/image/_right.png')],
        'navText' => [Html::tag('div', '', ['class' => 'nav-arr nav-left']), Html::tag('div', '', ['class' => 'nav-arr nav-right'])],
        //        'animateOut' => 'fadeOut',
//        'animateIn' => 'fadeIn',
//        'animateOut' => 'slideOutLeft',
//        'animateIn' => 'slideInRight',
    ]
]);
?>
<?php 
    if(count($model->productImages) > 4){
        $slicedImages = array_slice($model->productImages, 0, 3);
    } else {
        $slicedImages = $model->productImages;
    }
?>
<?php foreach ($slicedImages as $item): ?>
	<?php if(isset($item->Image)): ?>
    <div class="item-class">
    <a href="<?= Url::to('/catalog/' . $model->url) ?>">
        <img class="img img-fluid" src="<?= $item->Image ?>" data-srcset="" data-sizes="" alt="slider_img">
        </a>
    </div>
   <?php endif; ?>
<?php endforeach; ?>


<?php OwlCarouselWidget::end(); ?>

                    </div>

                </div>

            <!--<div class="product-description-wrap">-->
            <div class="h4">
                <?=
                Html::a($model->short_name ?  "<span style='text-transform: capitalize;display: block;font-weight: 400;font-size: 14px;'>$firstWord</span> " . $otherWords : $model->header,
                        ['/catalog/' . $model->url],
                        [
                            'class' => 'text-grid',
                            'title' => "<span style='font-weight: bold;'>$firstWord</span> " . $otherWords,
                ])
                ?>
                <?php //  $model->ord ?>
            </div>
            <!-- <div class="product-anons">
                <?php // echo $model->anons ?>
            </div> -->

        </div>
        <div class="panel-body">
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
