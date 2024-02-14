<?php

use yii\bootstrap\Html;
use yii\bootstrap\Tabs;
use app\modules\category\models\Category;

//print_r($parent);
if ($parent && $parent->id != 1)
    $this->params['breadcrumbs'][] = ['url' => '/catalog', 'label' => 'Каталог'];

if ($page->breadCatLink)
    $this->params['breadcrumbs'][] = $page->breadCatLink;

$this->params['breadcrumbs'][] = $page->short_name ? $page->short_name : $page->header;
?>
<div class="product_item">

    <div class="row">

        <div class="col-xs-12 content-block">

            <?php
            if ($page->product_type)
                echo Html::img('/image/razh.png', ['class' => 'pull-right'])
                    ?>
            <?php
            $category = Category::findOne($page->category_id);
            // return Html::a($category->header, ['/category/' . $model->uri, 'title' => $category->header]);
            ?>
            <p>
                <?php echo Html::a($category->header, ['/category/' . $category->url]); ?>
            </p>
            <h1 class="pull-left" good-id="<?= $page->id ?>">
                <?= $page->header ?>

                <?php
                if (!Yii::$app->user->isGuest):
                    echo Html::a(' ✏', ['/products/admin/update', 'id' => $page->id]);
                endif;
                ?>

            </h1>

            <div class="row cart-item">
                <div class="col-xs-12 col-sm-3 gallery-wrap">

                    <!-- <div class="gallery-popup-link" product-id="<?= $page->id ?>">
                        <i class="fas fa-search-plus"></i>
                    </div> -->
                    <?php
                    if (isset(Yii::$app->session['favorite'])) {
                        $data = array_unique(Yii::$app->session['favorite']);
                        if (in_array($page->id, $data))
                            $imgPath = '/image/ico/Избранное(зеленый).svg';
                        else {
                            $imgPath = '/image/ico/Избранное.svg';
                        }
                    } else {
                        $imgPath = '/image/ico/Избранное.svg';
                    }
                    ?>
                    <a href="#" onclick="Cart.Favorite(this, <?= $page->id ?>)">
                        <?= Html::img($imgPath, ['class' => 'favorite-img']) ?>
                    </a>
                    <!-- <a href="#" onclick="Cart.Compare(<?= $page->id ?>)"><?= Html::img('/image/ico/Сравнение.svg', ['class' => 'comparison-img']) ?></a> -->
                    <ul class="pgwSlider">
                        <?php
                        foreach ($page->productImages as $k => $image):
                            //
//                            if ($k > 3)
//                                continue;
                            ?>

                            <li href="#">
                                <?= Html::img('/image/ready/' .$image->image) ?>

                            </li>

                        <?php endforeach; ?>
                    </ul>
                    <?php // Html::img($page->image, ['class' => 'img img-responsive center-block', 'alt' => $page->header]);    ?>

                    <script type="text/javascript">
                        main['img_list_<?= $page->id ?>'] = [
                            <?php
                            foreach ($page->productImages as $item):
                                echo "{ src: '" . '/image/ready/' .$item->image . "', type: 'image' },";
                            endforeach;
                            ?>
                        ];
                    </script>

                </div>
                <div class="content col-xs-12 col-sm-9">
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
                        'label' => 'Описание',
                        'content' => $page->content_description,
                        'active' => true
                    ];
                    $items[] = [
                        'label' => 'Характеристики',
                        'content' => $page->content_characteristics,
                    ];
                    if ($page->content_install)
                        $items[] = [
                            'label' => 'Варианты установок',
                            'content' => preg_replace(
                                '/<img src="([^"]+)"+>/i'
                                ,
                                Html::a(
                                    Html::img('$1', ['class' => 'img img-responsive']),
                                    '$1'
                                    ,
                                    ['class' => 'popup-link']
                                ),
                                $page->content_install
                            ),
                        ];
                    $items[] = [
                        'label' => 'Сопутствующие товары',
                        'content' => \app\modules\products\widgets\SupportedGoodsWidget::widget([
                            'product_id' => $page->id
                        ]),
                    ];


                    echo Tabs::widget([
                        'items' => $items
                    ]);
                    ?>
                </div>

                <?php if ($page->youtube_link): ?>

                    <div class="col-xs-12">
                        <div class="h3">ВИДЕО</div>

                        <iframe width="100%" height="350" src="https://www.youtube.com/embed/<?= $page->youtube_link ?>"
                            frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>

                        </iframe>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <!-- <div class="hidden-xs col-xs-12 col-sm-4  col-sm-pull-8 category-left-menu"> -->
        <?php // echo app\modules\category\widgets\MenuCategory::widget(['active_id' => $page->category_id]); ?>
        <!-- </div> -->
    </div>
</div>
