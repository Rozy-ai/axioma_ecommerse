<?php

use app\components\Helper;
use yii\bootstrap\Html;
use yii\caching\Cache;
use app\modules\category\models\Category;

// $session = Yii::$app->session;
// menu session add
// if (isset($session['menuCategories'])) {
//     $categories = Yii::$app->session->get('menuCategories');
// }else{
$categories = Category::find()->with('childs')->orderBy([
    'in_menu_order' => SORT_DESC,
])->where(['is_enable' => 1, 'in_menu' => 1])
    ->all();
// $session->set('menuCategories', $categories);
// }
?>

<div class="container" id="bhoechie" style="display: none;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 bhoechie-tab">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                <div class="list-group">
                    <?php foreach ($categories as $key => $item) : ?>
                        <a href="<?= '/category' . '/' . $item->url ?>" class="list-group-item <?= ($key == 0) ? 'active' : ''; ?>">
                            <?= Html::img($item->Ico, ['height' => '26']) ?><?= $item->header ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <?php foreach ($categories as $key => $item) : ?>
                    <?php $childs = $item->childs ?>
                    <?php if (!empty($childs)) : ?>
                        <!-- flight section -->
                        <div class="bhoechie-tab-content <?= ($key == 0) ? 'active' : ''; ?>">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a href="<?= '/category' . '/' . $item->url ?>"><h4><?= $item->header ?></h4></a>
                                    <ul>
                                        <?php foreach ($childs as $child) : ?>
                                            <?php if($child->is_enable == 1): ?>
                                            <li class="catalog">
                                                <a href="<?= '/category' . '/' . $child->url ?>">
                                                    <?= $child->header ?>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a href="<?= '/' .$item->banner_url ?>">
                                    <?= Html::img($item->Image, ['width' => '100%']) ?>
                                    </a> <br><br>
                                    <?php //echo Html::img('/image/category/banner2.png', ['width' => '100%']) ?>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="bhoechie-tab-content <?= ($key == 0) ? 'active' : ''; ?>">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a href="<?= '/category' . '/' . $item->url ?>"><h4><?= $item->header ?></h4></a>
                                    <ul>
                                        <li class="catalog">
                                            <a href="<?= '/category' . '/' . $item->url ?>">
                                                <?= $item->header ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <a href="<?= '/' .$item->banner_url ?>">
                                <?= Html::img($item->Image, ['width' => '100%']) ?>
                                </a> <br><br>
                                    <?php //echo Html::img('/image/category/banner2.png', ['width' => '100%']) ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="bhoechie-tab-content <?= ($key == 0) ? 'active' : ''; ?>">
                            Ничего не найдено
                        </div> -->
                    <?php endif; ?>



                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>