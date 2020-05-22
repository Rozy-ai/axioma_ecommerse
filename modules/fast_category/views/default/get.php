<?php

use yii\widgets\Pjax;
use yii\widgets\ListView;
use kop\y2sp\ScrollPager;

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

$this->params['breadcrumbs'][] = $category->header;
?>
<div class="">

    <h1><?= $category->header ?> </h1>

    <?php echo $this->render('_search', ['model' => $search, 'category' => $category]) ?>

    <div class="product-list">
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
            'layout' => '{summary}{items}<div class="text-center col-xs-12">{pager}</div>'
        ]);
        ?>
    </div>
    <?= $category->content ?>

    <?= $this->render('@app/views/site/_about') ?>
    <?= $this->render('@app/views/site/_contact_form') ?>

</div>

<?php
//Pjax::end();

