<?php
//print_r($parent);
//echo $category->uri;
//echo $category->id;
if ($parent)
    $this->params['breadcrumbs'][] = ['url' => '/category/' . $parent->uri, 'label' => $parent->title];
//
//print_r($category->getBreadCrumbs());
//exit();
//foreach ($category->getBreadCrumbs() as $item)
//    $this->params['breadcrumbs'][] = $item;

$this->params['breadcrumbs'][] = $category->header;
?>
<div class="product_item">

    <div class="row">

        <div class="col-xs-12 col-sm-4 category-left-menu">
            <?= \app\modules\category\widgets\MenuCategory::widget(['active_id' => $category->id]); ?>
        </div>
        <div class="col-xs-12 col-sm-8">

            <div class="row">
                <h1><?= $category->header ?> </h1>
            </div>

            <div class="row">

                <?php if ($products) : ?>
                    <div class="product-list col-xs-12">
                        <?php
                        foreach ($products as $product):
                            echo $this->render('@app/modules/products/views/default/product-cart', ['model' => $product]);
                        endforeach;
                        ?>
                    </div>
                <?php endif; ?>

            </div>
            <?= $category->content ?>
        </div>
    </div>
</div>

