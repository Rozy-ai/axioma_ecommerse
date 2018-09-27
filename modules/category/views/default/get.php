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

$this->params['breadcrumbs'][] = $category->title;
?>
<div class="product_item">

    <div class="row">

        <div class="col-xs-12 col-sm-4 category-menu">
            <?= \app\modules\category\widgets\MenuCategory::widget(['active_id' => $category->id]); ?>
        </div>
        <div class="col-xs-12 col-sm-8">
            <h1><?= $category->title ?> </h1>

            <div class="row">

                <?php if ($childs): ?>
                    <p class="h2">Подкатегории</p>
                    <?php
                    foreach ($childs as $child)
                        echo $this->render('_child', ['model' => $child]);
                    ?>
                <?php endif; ?>


                <?php if ($products) : ?>
                    <div class="product-list col-xs-12">
                        <div class="row">
                            <p class="h3">Продукция</p>
                            <?php
                            foreach ($products as $product):
                                echo $this->render('_product', ['model' => $product]);
                            endforeach;
                            ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
            <?= $category->content ?>
        </div>
    </div>
</div>

