<?php
//print_r($parent);
if ($parent && $parent->id != 1)
    $this->params['breadcrumbs'][] = ['url' => '/catalog/', 'label' => 'Каталог'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product_item">

    <div class="row">

        <div class="col-xs-12 col-sm-4 category-menu">
            <?= app\modules\category\widgets\MenuCategory::widget(); ?>
        </div>
        <div class="col-xs-12 col-sm-8">
            <h1><?= $page->h1 ? $page->h1 : $this->title ?></h1>


            <?= $page->getCatLinks(); ?>

            <div class="row cart-item">
                <div class="content col-xs-12">
                    <?= $page->content ?>
                </div>
                <div class="add-cart col-xs-12 col-sm-6 well">
                    <?= \app\modules\cart\widgets\AddToCartWidget::widget(['product_id' => $page->id]) ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="btn-group" role="group">
                        <?= app\modules\forms\widgets\GoodQuestion::widget(['product_id' => $page->id]) ?>
                        <?= app\modules\forms\widgets\SendReview::widget(['product_id' => $page->id]) ?>
                    </div>
                </div>


                <div class="content2 col-xs-12">
                    <?= $page->content2 ?>
                </div>

            </div>

        </div>


    </div>
</div>

