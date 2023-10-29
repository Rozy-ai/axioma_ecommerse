<?php

use yii\widgets\Pjax;
use yii\widgets\ListView;
use kop\y2sp\ScrollPager;

//print_r($parent);
//echo $category->uri;
//echo $category->id;
if ($parent)
    $this->params['breadcrumbs'][] = ['url' => '/category/' . $parent->uri, 'label' => $parent->title];
//
//print_r($category->getBreadCrumbs());
//exit();
foreach ($category->getBreadCrumbs() as $item)
    $this->params['breadcrumbs'][] = $item;

Pjax::begin();

$this->params['breadcrumbs'][] = $category->header;
?>
<div class="product_item">

    <div class="row">


        <div class="col-xs-12">

            <div class="row">
                <h1><?= $category->header ?> </h1>
            </div>

            <div class="row">

                <div class="hidden">
                    <p class="pull-left">
                        <!--                        -->
                    </p>
                    <p class="pull-right">
                        Сортировка : <?php echo $sort->link('price') . ' | ' . $sort->link('hit') . ' | ' . $sort->link('new') ?>
                    </p>
                </div>

                <?php // if ($products) : ?>
                <?php if (false) : ?>
                    <div class="product-list col-xs-12">
                        <?php
                        foreach ($products as $product):
                            echo $this->render('@app/modules/products/views/default/product-cart', ['model' => $product]);
                        endforeach;
                        ?>
                    </div>
                <?php endif; ?>

            </div>

            <?php
            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'itemView' => '@app/modules/products/views/default/product-cart',
                'pager' => [
                    'class' => ScrollPager::className(),
                    'triggerText' => '',
                    'noneLeftTemplate' => '<div class="ias-noneleft article-preview__direction">{text}</div>',
//                    'noneLeftText' => 'Нет больше новостей для отображения',
                    'enabledExtensions' => [ScrollPager::EXTENSION_SPINNER, ScrollPager::EXTENSION_NONE_LEFT, ScrollPager::EXTENSION_PAGING],
                    'eventOnScroll' => 'function() {$(\'.ias-trigger a\').trigger(\'click\')}',
                ],
                'summary' => ''
            ]);
            ?>

            <?= $category->content ?>
        </div>

        <!-- <div class="col-xs-12 col-sm-4  col-sm-pull-8 category-left-menu"> -->
            <?php //echo \app\modules\category\widgets\MenuCategory::widget(['active_id' => $category->id]); ?>
        <!-- </div> -->
    </div>
</div>

<?php
Pjax::end();

