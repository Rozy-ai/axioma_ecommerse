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
        <meta property="og:image" content="/image/og_image.jpg"/>
        <?php
        // Свои метатеги
        echo RegionTemplates::getInHeader();
        ?>

        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">


        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!--<script src="//code-ya.jivosite.com/widget/3nGNkWmwJP" async></script>-->
        <!--amocrm-->
        <script>(function (a, m, o, c, r, m) {
                a[m] = {id: "380253", hash: "3d00941b66698edda5bf251b45512e780bb831dbcb928cc1f208e63d4b399206", locale: "ru", inline: false, setMeta: function (p) {
                        this.params = (this.params || []).concat([p])
                    }};
                a[o] = a[o] || function () {
                    (a[o].q = a[o].q || []).push(arguments)
                };
                var d = a.document, s = d.createElement('script');
                s.async = true;
                s.id = m + '_script';
                s.src = 'https://gso.amocrm.ru/js/button.js?1676292252';
                d.head && d.head.appendChild(s)
            }(window, 0, 'amoSocialButton', 0, 0, 'amo_social_button'));</script>
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
                <div class="col-xs-12 col-md-2 popup-search text-right">
                    <?php echo app\modules\search\widgets\Search::widget(); ?>
                </div>
                <div class="col-xs-12 col-md-2">
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
                        $img = Html::img('/image/logo-mobile.svg', ['class' => 'img', 'alt' => 'Логотип', 'height' => '46', 'onerror' => "this.src='/image/logo-mobile.png'"]);
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
                            $img = Html::img('/image/logo_new.svg', ['class' => 'img img-responsive', 'alt' => 'Логотип', 'onerror' => "this.src='logo.png'"]);
                            echo!$isHome ? Html::a($img, ['/']) : $img;
                            ?>
                                                                        <!--<img src="/image/logo.png" class="img img-responsive">-->
                        </div>
                        <!--                        <div class="col-xs-12 col-sm-2 work-time hidden-xs col-md-2 col-lg-2">
                                                    <p class=""><strong>График работы</strong></p>
                        <?= Yii::$app->info::get('work_time') ?>
                                                </div>-->
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-9  office">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8 city-choise-wrap">

                                            <?= \app\modules\city\widgets\CityChoice::widget() ?>

                                            <div class="address text-gray">
                                                <?= RegionTemplates::getVal('address') ?>
                                            </div>
                                            <div class="phone-secondary text-gray">
                                                тел: <?= RegionTemplates::getVal('phone-2') ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 text-right">
                                            <div class="work-time">
                                                <div class="wt-header">
                                                    <i class="far fa-clock"></i>
                                                    ЧАСЫ РАБОТЫ
                                                </div>

                                                <?php if (Yii::$app->city->id == 1107): ?>
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
                                                <?php else: ?>
                                                    <div class="row">
                                                        <div class="col-xs-5">
                                                            Пн-пт:
                                                        </div>
                                                        <div class="col-xs-7">
                                                            09.00 — 18.00
                                                        </div>
                                                        <div class="col-xs-5">
                                                            сб-вс:
                                                        </div>
                                                        <div class="col-xs-7">
                                                            <strong>Выходной</strong>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>


                                                <?php Yii::$app->info::get('work_time') ?>
                                            </div>
                                        </div>

                                        <!--                                <div class="col-xs-12 hidden-md hidden-sm hidden-lg">
                                                                            <p class=""><strong>График работы</strong></p>
                                        <?= Yii::$app->info::get('work_time') ?>
                                                                        </div>-->

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 phone-wrap " >
                                    <div class="phone text-center">
                                        <a href="tel:<?= str_replace(['-', '(', ')', ' '], '', Yii::$app->info::get('headTelephone')) ?>" class="center-block text-center">
                                            <?= Yii::$app->info::get('headTelephone') ?>
                                        </a>
                                    </div>
                                    <div class="free-call center-block text-center">Звонок бесплатный</div>
                                    <?= \app\modules\forms\widgets\CallBack::widget(); ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="top-line" class="bottom-menu">
                    <div class="container">

                        <?= $this->render('_top_line') ?>

                        <?php
//                    NavBar::begin([
//                        'options' => [
//                            'class' => 'navbar',
//                        ],
//                    ]);
                        ?>
                        <?php
//                    echo Nav::widget([
//                        'options' => ['class' => 'top-line-nav'],
//                        'encodeLabels' => false,
//                        'items' => Menu::getBottomMenu(),
//                    ]);
                        ?>
                        <?php
//                    NavBar::end();
                        ?>
                    </div>
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

                    <?php if (Yii::$app->params['show_viewed']): ?>

                        <div class="viewed-goods-wrap">
                            <!--<div class="row">-->
                            <div class="container">
                                <div class="viewed-goods">
                                    <?= \app\modules\catalog\widgets\ViewedGoods::widget(); ?>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
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


                                    <div class="col-xs-12 col-sm-5 col-sm-push-4">
                                        <ul class="list-unstyled list-inline">
                                            <?= Menu::getFooterItems(2) ?>
                                        </ul>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-sm-pull-5">
                                        <ul class="list-unstyled list-inline">
                                            <?= Menu::getFooterItems(1) ?>
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
                                    <a href="tel:<?= str_replace(['-', '(', ')', ' '], '', Yii::$app->info::get('headTelephone')) ?>">
                                        <?= Yii::$app->info::get('headTelephone') ?>
                                    </a>
                                    <br/>
                                </p>
                                <?= \app\modules\forms\widgets\CallBack::widget(['in_footer' => true]); ?>
                                <p class="insta">
                                    <!--                                    <a href="https://www.instagram.com/axioma.pro.russia/" target="_blank">
                                                                            <i class="fab fa-instagram" aria-hidden="true"></i></a>-->
                                    <a href="https://www.youtube.com/c/AxiomaPro/featured" target="_blank">
                                        <img src="/image/ico/YT.svg" height="40">
                                        <!--<i class="fab fa-youtube" aria-hidden="true"></i>-->
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="container">
                        <div class="pull-left">
                            <p><strong>©  2009-<?= date('Y') ?> ООО “Аксиома”</strong>
                                <br>
                                Копирование информации сайта разрешено только с письменного согласия администрации</p>
                        </div>
                        <div class="pull-right">
                            <?php
                            echo Yii::$app->info::get('counters');
                            ?>
                        </div>
                    </div>
                </div>
            </footer>


            <?php echo \app\modules\forms\widgets\OneClickOrder::widget() ?>

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
        <!--<script type="text/javascript" src="https://w.callbackhunter.com/cbh.js?hunter_code=51124a1b34a5d693228b07c3c7665145" charset="UTF-8"></script>-->

        <!-- Facebook Pixel Code -->
        <script>
            !function (f, b, e, v, n, t, s)
            {
                if (f.fbq)
                    return;
                n = f.fbq = function () {
                    n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '1012062222540340');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=1012062222540340&ev=PageView&noscript=1"
                       /></noscript>
        <!-- End Facebook Pixel Code -->

    </body>
</html>
<?php $this->endPage() ?>
