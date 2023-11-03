<?php

use yii\widgets\Pjax;
use yii\widgets\ListView;
use kop\y2sp\ScrollPager;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\modules\menu\models\Menu;

//print_r($parent);
//echo $category->uri;
//echo $category->id;
//if ($parent)
//    $this->params['breadcrumbs'][] = ['url' => '/category/' . $parent->uri, 'label' => $parent->title];
//
//print_r($category->getBreadCrumbs());
//exit();
//foreach ($category->getBreadCrumbs() as $item)
//    $this->params['breadcrumbs'][] = $item;
//Pjax::begin(['id' => 'some-id', 'clientOptions' => ['method' => 'POST']]);

if ($category == 'favorite') {
    $this->params['breadcrumbs'][] = 'Избранные товары';
} elseif ($category == 'compare') {
    $this->params['breadcrumbs'][] = 'Сравнение товаров';
} else {
    $this->params['breadcrumbs'][] = $category->header;
}

?>
<div class="catalog-new">

    <h1>
        <?php
        if ($category == 'favorite') {
            echo 'Избранные товары';
        } elseif ($category == 'compare') {
            echo 'Сравнение товаров';
        } else {
            echo $category->header;
        }
        ?>
    </h1>
    <?php if ($category == 'compare') : ?>
        <?php echo $this->render('compare_search', ['model' => $search, 'category' => $category]) ?>
        <div class="product-list" id="product-list">
            <?php
            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'options' => ['class' => "row"],
                //            'itemOptions' => ['class' => 'item row'],
                'itemView' => '@app/modules/products/views/default/product-cart-grid-compare',
                //                'pager' => [
                //                    'class' => ScrollPager::className(),
                //                    'triggerText' => '',
                //                    'noneLeftTemplate' => '<div class="ias-noneleft article-preview__direction">{text}</div>',
                //                    'noneLeftText' => 'Нет больше новостей для отображения',
                //                    'enabledExtensions' => [ScrollPager::EXTENSION_SPINNER, ScrollPager::EXTENSION_NONE_LEFT, ScrollPager::EXTENSION_PAGING],
                //                    'eventOnScroll' => 'function() {$(\'.ias-trigger a\').trigger(\'click\')}',
                //                ],
                'summary' => '',
                'layout' => '{summary}{items}<div class="text-center col-xs-12">{pager}</div>',
                'emptyText' => '<div class="col-xs-12">Ничего не найдено.</div>',
            ]);
            ?>
        </div>
    <?php else : ?>
        <div class="hidden-xs hidden-sm">
            <?php
            echo Nav::widget([
                'options' => ['class' => 'top-line-nav'],
                'encodeLabels' => false,
                'items' => Menu::getBottomMenu(),
            ]);
            ?>
        </div>
        <?php echo $this->render('_search', ['model' => $search, 'category' => $category]) ?>

        <div class="product-list" id="product-list">
            <?php
            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'options' => ['class' => "row"],
                //            'itemOptions' => ['class' => 'item row'],
                'itemView' => '@app/modules/products/views/default/product-cart-grid',
                //                'pager' => [
                //                    'class' => ScrollPager::className(),
                //                    'triggerText' => '',
                //                    'noneLeftTemplate' => '<div class="ias-noneleft article-preview__direction">{text}</div>',
                //                    'noneLeftText' => 'Нет больше новостей для отображения',
                //                    'enabledExtensions' => [ScrollPager::EXTENSION_SPINNER, ScrollPager::EXTENSION_NONE_LEFT, ScrollPager::EXTENSION_PAGING],
                //                    'eventOnScroll' => 'function() {$(\'.ias-trigger a\').trigger(\'click\')}',
                //                ],
                'summary' => '',
                'layout' => '{summary}{items}<div class="text-center col-xs-12">{pager}</div>',
                'emptyText' => '<div class="col-xs-12">Ничего не найдено.</div>',
            ]);
            ?>
        </div>
        <div class="product_item" style="display: none;" id="product-item">

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

        </div>
    <?php endif; ?>


    <?= $category->content ?>

    <?php
    if (
        $category->id == 1 ||
        $category->id == 4 ||
        $category->id == 5 ||
        $category->id == 3
    ) :
    ?>

        <?= $this->render('@app/views/site/_about') ?>

    <?php endif; ?>
    <!-- <div class="row">
    <div class="col-xs-12 contact-form">
        <?php // echo app\modules\forms\widgets\Contact::widget(); 
        ?>
    </div>
</div> -->

</div>


<?php
//Pjax::end();
