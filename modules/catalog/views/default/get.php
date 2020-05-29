<?php

use yii\bootstrap\Html;
use yii\bootstrap\Tabs;

//print_r($parent);
if ($parent && $parent->id != 1)
    $this->params['breadcrumbs'][] = ['url' => '/catalog', 'label' => 'Каталог'];

if ($page->breadCatLink)
    $this->params['breadcrumbs'][] = $page->breadCatLink;

$this->params['breadcrumbs'][] = $page->header;
?>
<div class="product_item">

    <div class="row">

        <div class="col-xs-12  col-sm-8 col-sm-push-4 content-block">

            <?php
            if ($page->product_type)
                echo Html::img('/image/razh.png', ['class' => 'pull-right'])
                ?>


            <h1 class="pull-left" good-id="<?= $page->id ?>"><?= $page->header ?></h1>

            <div class="row cart-item">
                <div class="col-xs-12 col-sm-5 gallery-wrap">

                    <div class="gallery-popup-link" product-id="<?= $page->id ?>">
                        <i class="fas fa-search-plus"></i>
                    </div>

                    <ul class="pgwSlider">
                        <?php
                        foreach ($page->productImages as $k => $image):
//
//                            if ($k > 3)
//                                continue;
                            ?>

                            <li href="#">
                                <?= Html::img($image->Image) ?>

                            </li>

                        <?php endforeach; ?>
                    </ul>
                    <?php // Html::img($page->image, ['class' => 'img img-responsive center-block', 'alt' => $page->header]);   ?>

                    <script type="text/javascript">
                        main['img_list_<?= $page->id ?>'] = [
<?php
foreach ($page->productImages as $item):
    echo "{ src: '" . $item->getImage() . "', type: 'image' },";
endforeach;
?>
                        ];
                    </script>

                </div>
                <div class="content col-xs-12 col-sm-7 ">
                    <?=
                    \app\modules\cart\widgets\AddToCartWidget::widget([
                        'product_id' => $page->id,
                        'type' => 'full',
                    ])
                    ?>
                </div>


                <div class="product-tabs col-xs-12">

                    <?php
                    $items = [];
                    $items[] = [
                        'label' => 'Характеристики',
                        'content' => $page->content_characteristics,
                        'active' => true
                    ];
                    if ($page->content_install)
                        $items[] = [
                            'label' => 'Варианты установок',
                            'content' => preg_replace('/<img src="([^"]+)"+>/i'
                                    , Html::a(Html::img('$1', ['class' => 'img img-responsive']), '$1'
                                            , ['class' => 'popup-link']), $page->content_install),
                        ];
                    $items[] = [
                        'label' => 'Сопутствующие товары',
                        'content' => \app\modules\products\widgets\SupportedGoodsWidget::widget([
                            'product_id' => $page->id
                        ]),
                    ];
                    $items[] = [
                        'label' => 'Описание',
                        'content' => $page->content_description,
                    ];


                    echo Tabs::widget([
                        'items' => $items
                    ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="hidden-xs col-xs-12 col-sm-4  col-sm-pull-8 category-left-menu">
            <?= app\modules\category\widgets\MenuCategory::widget(['active_id' => $page->category_id]); ?>
        </div>
    </div>
</div>

