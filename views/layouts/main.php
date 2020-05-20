<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use app\modules\region_templates\models\RegionTemplates;
use app\modules\menu\models\Menu;
use app\widgets\Alert;

AppAsset::register($this);

$controller = Yii::$app->controller;
$default_controller = Yii::$app->defaultRoute;
$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? true : false;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        // Свои метатеги
        echo RegionTemplates::getInHeader();
        ?>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?= Yii::$app->info::get('after_body') ?>
        <?php $this->beginBody() ?>

        <script type="text/javascript">
            var main = [];
        </script>
        <div class="wrap">
            <?php
            NavBar::begin([
                'options' => [
                    'class' => 'navbar-inverse main-navbar hidden-xs hidden-sm',
                ],
            ]);
            ?>


            <div class="row">

                <div class="col-xs-12 col-md-8">

                    <?php
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-left'],
                        'encodeLabels' => false,
                        'items' => Menu::getTopItems()['top'],
                    ]);
                    ?>

                </div>
                <div class="col-xs-12 col-md-3 popup-search text-right">
                    <?php echo app\modules\search\widgets\Search::widget(); ?>
                </div>
                <div class="col-xs-12 col-md-1">
                    <?php
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'encodeLabels' => false,
                        'items' => Menu::getTopItems()['bottom'],
                    ]);
                    ?>
                </div>
            </div>

            <?php
            NavBar::end();
            ?>


            <div class="header-mobile container hidden-md hidden-lg">
                <div class="row">
                    <div class="col-xs-7 logo-wrap">
                        <?php
                        $img = Html::img('/image/logo-mobile.png', ['class' => 'img img-responsive', 'alt' => 'Логотип', 'onerror' => "this.src='/image/logo-mobile.png'"]);
                        echo!$isHome ? Html::a($img, ['/']) : $img;
                        ?>
                    </div>
                    <div class="col-xs-5">
                        <div class="row">
                            <div class="col-xs-5 text-center cart-wrap">
                                <a href="/cart">
                                    <div class="cart-top" data-container=".wrap" data-html="true" data-title="ТОВАРЫ ДОБАВЛЕННЫЕ В КОРЗИНУ" data-toggle="popover" data-placement="bottom" data-content="Корзина пуста" data-original-title="" title="">
                                    <!--    <span class="glyphicon glyphicon-shopping-cart">
                                    </span>-->
                                        <img class="img" src="/image/shopping_cart.png" height="30px" alt="">    <span class="count badge">0</span>
                                    </div></a>
                            </div>
                            <div class="col-xs-7 text-right">

                                <div class="Fixed">
                                    <button id="mmenu-icon" class="hamburger hamburger--spin" type="button">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                    </button>
                                </div>
                                <!--                                    <button id="mmenu-icon" class="hamburger hamburger--collapse" type="button">
                                                                        <span class="hamburger-box">
                                                                            <span class="hamburger-inner"></span>
                                                                        </span>
                                                                    </button>-->
                                <?php Html::a(Html::img('/image/menu.png'), '#menu', ['alt' => 'image', 'classs' => 'mobile-menu-btn']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="header hidden-xs hidden-sm">
                <div class="container middle-line">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-3 logo-wrap">
                            <?php
                            $img = Html::img('/image/logo.svg', ['class' => 'img img-responsive', 'alt' => 'Логотип', 'onerror' => "this.src='logo.png'"]);
                            echo!$isHome ? Html::a($img, ['/']) : $img;
                            ?>
                                                                        <!--<img src="/image/logo.png" class="img img-responsive">-->
                            <p class="slogan">СИСТЕМЫ ПРЕДОТВРАЩЕНИЯ КРАЖ</p>
                        </div>
                        <!--                        <div class="col-xs-12 col-sm-2 work-time hidden-xs col-md-2 col-lg-2">
                                                    <p class=""><strong>График работы</strong></p>
                        <?= Yii::$app->info::get('work_time') ?>
                                                </div>-->
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-9  office">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8">
                                            <div class="city-choise">
                                                <?= \app\modules\city\widgets\CityChoice::widget() ?>
                                            </div>
                                            <div class="address">
                                                <?= RegionTemplates::getVal('address') ?>
                                            </div>
                                            <div class="phone">
                                                Тел: <?= RegionTemplates::getVal('phone-2') ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 text-right">
                                            <div class="work-time">
                                                <div class="wt-header">
                                                    <i class="far fa-clock"></i>
                                                    ЧАСЫ РАБОТЫ
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-5">
                                                        Пн-пт:
                                                    </div>
                                                    <div class="col-xs-7">
                                                        09.00 — 18.00
                                                    </div>
                                                    <div class="col-xs-5">
                                                        сб:
                                                    </div>
                                                    <div class="col-xs-7">
                                                        09.00 — 14.00
                                                    </div>
                                                    <div class="col-xs-5">
                                                        вс:
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <strong>Выходной</strong>
                                                    </div>
                                                </div>

                                                <?php Yii::$app->info::get('work_time') ?>
                                            </div>
                                        </div>

                                        <!--                                <div class="col-xs-12 hidden-md hidden-sm hidden-lg">
                                                                            <p class=""><strong>График работы</strong></p>
                                        <?= Yii::$app->info::get('work_time') ?>
                                                                        </div>-->

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1 phone-wrap" >
                                    <div class="phone">
                                        <a href="tel:<?= Yii::$app->info::get('headTelephone') ?>">
                                            <?= Yii::$app->info::get('headTelephone') ?>
                                        </a>
                                    </div>
                                    <p class="free-call">Звонок бесплатный</p>
                                    <?= \app\modules\forms\widgets\CallBack::widget(); ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="top-line" class="bottom-menu">
                    <?php
                    NavBar::begin([
                        'options' => [
                            'class' => 'navbar',
                        ],
                    ]);
                    ?>
                    <?php
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-left'],
                        'encodeLabels' => false,
                        'items' => Menu::getBottomMenu(),
                    ]);
                    ?>
                    <?php
                    NavBar::end();
                    ?>
                </div>
            </div>



            <?php if ($isHome): ?>
                <div class="container-fluid">
                    <!--<div class="row">-->
                    <?= $content ?>
                    <!--</div>-->
                </div>
            <?php else: ?>
                <div class="<?= Yii::$app->params['isFluid'] ? 'container-fluid' : 'container' ?>">
                    <div class="content">
                        <div class="<?= Yii::$app->params['isFluid'] ? 'container' : '' ?>">
                            <?=
                            Breadcrumbs::widget([
                                'links' => $this->params['breadcrumbs'] ?? [],
                                'options' => ['class' => 'breadcrumb', 'itemscope' => true, 'itemtype' => 'http://schema.org/BreadcrumbList'],
                                'itemTemplate' => '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">{link}</li>' . PHP_EOL,
                                'activeItemTemplate' => '<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">{link}</li>' . PHP_EOL,
                            ]);
//                        Breadcrumbs::widget([
//                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//                        ])
                            ?>
                            <?= Alert::widget() ?>
                        </div>
                        <div id="content">
                            <?= $content ?>
                        </div>

                    </div>

                    <div class="viewed-goods-wrap">
                        <!--<div class="row">-->
                        <div class="container">
                            <div class="viewed-goods">
                                <?= \app\modules\catalog\widgets\ViewedGoods::widget(); ?>
                            </div>

                            <!--<div class="col-xs-12 col-sm-8 thanks">-->
                            <?php // app\modules\thanks\widgets\ThanksList::widget();     ?>
                            <!--</div>-->
                            <!--<div class="col-xs-12 col-sm-4 contact-form">-->
                            <?php // app\modules\forms\widgets\Contact::widget();    ?>
                            <!--</div>-->

                            <!--<div class="slider">-->
                            <?php //\app\modules\slider\widgets\MainSlider::widget();     ?>
                            <!--</                                            div>-->
                            <!--</div>-->
                        </div>
                    </div>

                <?php endif; ?>

            </div>

            <footer class="footer">

                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="hidden-xs hidden-sm col-md-3">
                                <p class="title">АДРЕС</p>
                                <p>г. <?= RegionTemplates::getVal('city') ?></p>
                                <p><?= RegionTemplates::getVal('address') ?></p>
                                <p>Тел: <?= RegionTemplates::getVal('phone-2') ?></p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">

                                <div class="row">
                                    <div class="col-xs-12">
                                        <p class="title">КАРТА САЙТА</p>

                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <ul class="list-unstyled list-inline">
                                            <?= Menu::getFooterItems(1) ?>
                                        </ul>

                                    </div>
                                    <div class="col-xs-12 col-sm-5">
                                        <ul class="list-unstyled list-inline">
                                            <?= Menu::getFooterItems(2) ?>
                                        </ul>

                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <ul class="list-unstyled list-inline">
                                            <?= Menu::getFooterItems(3) ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-6 hidden-md hidden-lg">
                                <p class="title">АДРЕС</p>
                                <p>г. <?= RegionTemplates::getVal('city') ?></p>
                                <p><?= RegionTemplates::getVal('address') ?></p>
                                <p>Тел: <?= RegionTemplates::getVal('phone-2') ?></p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 right-side">
                                <p class="email">
                                    email: <a href="mailto:<?= Yii::$app->info::get('email') ?>">
                                        <?= Yii::$app->info::get('email') ?>
                                    </a>
                                </p>
                                <p class="phone">
                                    <a href="tel:<?= Yii::$app->info::get('headTelephone') ?>">
                                        <?= Yii::$app->info::get('headTelephone') ?>
                                    </a>
                                    <br/>
                                </p>
                                <?= \app\modules\forms\widgets\CallBack::widget(['in_footer' => true]); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="container">
                        <div class="pull-left">
                            <?= Yii::$app->info::get('copy') ?>
                        </div>
                        <div class="pull-right">
                            <?php
                            echo Yii::$app->info::get('counters');
                            ?>
                        </div>
                    </div>
                </div>

                <a href="#" class="footer-up" onclick="$('html, body').stop().animate({scrollTop: 0}, 800, 'swing'); return false;">
                    <?= Html::img('/image/arr_top.png', ['height' => 60]) ?>
                </a>

            </footer>

            <?php echo $this->render('_mobile_menu') ?>

        </div>

        <?php $this->endBody() ?>
        <!-- Код тега ремаркетинга Google -->
        <script type="text/javascript">
            /* <![CDATA[ */
            var google_conversion_id = 925543648;
            var google_custom_params = window.google_tag_params;
            var google_remarketing_only = true;
            /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
        </script>
        <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/925543648/?guid=ON&amp;script=0"/>
        </div>
        </noscript>
        <script type="text/javascript" src="//cdn.callbackhunter.com/cbh.js?hunter_code=51124a1b34a5d693228b07c3c7665145" charset="UTF-8"></script>
    </body>
</html>
<?php $this->endPage() ?>
