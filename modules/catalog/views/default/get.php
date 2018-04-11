<?php

use yii\bootstrap\Html;

//print_r($parent);
if ($parent && $parent->id != 1)
    $this->params['breadcrumbs'][] = ['url' => '/catalog', 'label' => 'Каталог'];
$this->params['breadcrumbs'][] = $page->name;
?>
<div class="product_item">

    <div class="row">

        <div class="col-xs-12 col-sm-4 category-menu">
            <?= app\modules\category\widgets\MenuCategory::widget(); ?>
        </div>
        <div class="col-xs-12 col-sm-8 content-block">
            <h1 good-id="<?= $page->id ?>"><?= $page->h1 ? $page->h1 : $page->name ?></h1>


            <?= $page->getCatLinks(); ?>

            <div class="row cart-item">
                <div class="content col-xs-12 col-sm-6">
                    <?= $page->image ? Html::img($page->image, ['class' => 'img img-responsive center-block', 'alt' => $page->h1 ? $page->h1 : $page->name]) : ''; ?>

                </div>
                <div class="content col-xs-12 col-sm-6 ">
                    <div class="well">
                        <?= \app\modules\cart\widgets\AddToCartWidget::widget(['product_id' => $page->id]) ?>
                    </div>
                </div>

                <!--                <div class="col-xs-12 col-sm-6 ">
                                    <div class="btn-group" role="group">
                <?php // app\modules\forms\widgets\GoodQuestion::widget(['product_id' => $page->id]) ?>
                <?php // app\modules\forms\widgets\SendReview::widget(['product_id' => $page->id]) ?>
                                        <p>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <br/>
                                        </p>
                                    </div>
                                </div>-->


                <div class="content2 col-xs-12">
                    <?= $page->content ?>
                    <?= $page->content2 ?>
                </div>

            </div>

        </div>


    </div>
</div>

