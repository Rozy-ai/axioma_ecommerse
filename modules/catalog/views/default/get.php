<?php

use yii\bootstrap\Html;
use yii\bootstrap\Tabs;

//print_r($parent);
if ($parent && $parent->id != 1)
    $this->params['breadcrumbs'][] = ['url' => '/catalog', 'label' => 'Каталог'];
$this->params['breadcrumbs'][] = $page->breadCatLink;
$this->params['breadcrumbs'][] = $page->header;
?>
<div class="product_item">

    <div class="row">

        <div class="col-xs-12 col-sm-4 category-menu">
            <?= app\modules\category\widgets\MenuCategory::widget(); ?>
        </div>
        <div class="col-xs-12 col-sm-8 content-block">

            <?php
            if ($page->product_type)
                echo Html::img('/image/razh.png', ['class' => 'pull-right'])
                ?>


            <h1 class="pull-left" good-id="<?= $page->id ?>"><?= $page->header ?></h1>

            <div class="row cart-item">
                <div class="content col-xs-12 col-sm-6">

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

                </div>
                <div class="content col-xs-12 col-sm-6 ">
                    <?=
                    \app\modules\cart\widgets\AddToCartWidget::widget([
                        'product_id' => $page->id,
                        'type' => 'full',
                    ])
                    ?>
                </div>

                <!--                <div class="col-xs-12 col-sm-6 ">
                                    <div class="btn-group" role="group">
                <?php // app\modules\forms\widgets\GoodQuestion::widget(['product_id' => $page->id])  ?>
                <?php // app\modules\forms\widgets\SendReview::widget(['product_id' => $page->id])    ?>
                                        <p>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <br/>
                                        </p>
                                    </div>
                                </div>-->


                <div class="product-tabs col-xs-12 ">

                    <?php
                    echo Tabs::widget([
                        'items' => [
                            [
                                'label' => 'Описание',
                                'content' => $page->content_description,
                                'active' => true
                            ],
                            [
                                'label' => 'Характеристики',
                                'content' => $page->content_characteristics,
                            ],
                            [
                                'label' => 'Варианты установок',
                                'content' => $page->content_install,
                            ],
                            [
                                'label' => 'Сопутствующие товары',
                                'content' => \app\modules\products\widgets\SupportedGoodsWidget::widget([
                                    'product_id' => $page->id
                                ]),
                            ],
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

