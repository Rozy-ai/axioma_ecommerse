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
    <meta property="og:image" content="/image/og_image.jpg" />

    <meta name="yandex-verification" content="69eb3983cceabd14" />

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
    <title>
        <?= Html::encode($this->title) ?>
    </title>
    <?php $this->head() ?>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(53040199, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/53040199" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RFKZV7CMNH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-RFKZV7CMNH');
    </script>

    <!-- Top.Mail.Ru counter -->
    <script type="text/javascript">
        var _tmr = window._tmr || (window._tmr = []);
        _tmr.push({
            id: "3340974",
            type: "pageView",
            start: (new Date()).getTime()
        });
        (function (d, w, id) {
            if (d.getElementById(id)) return;
            var ts = d.createElement("script");
            ts.type = "text/javascript";
            ts.async = true;
            ts.id = id;
            ts.src = "https://top-fwz1.mail.ru/js/code.js";
            var f = function () {
                var s = d.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(ts, s);
            };
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "tmr-code");
    </script>
    <noscript>
        <div><img src="https://top-fwz1.mail.ru/counter?id=3340974;js=na" style="position:absolute;left:-9999px;"
                alt="Top.Mail.Ru" /></div>
    </noscript>
    <!-- /Top.Mail.Ru counter -->

    <script src="//code-ya.jivosite.com/widget/3nGNkWmwJP" async></script>

    <script>
        //        function ym(i,u,u) {
        //
        //        }
    </script>
    <script src="https://app2.gnzs.ru/site-integration/js/script.v3.js" data-platform="amo" data-account="29896285"
        data-token="bfac5b47-a495-4c8c-b417-1f8be495a64e"></script>
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

            <div class="col-xs-12 col-md-offset-3">

                <?php
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-left'],
                    'encodeLabels' => false,
                    'items' => Menu::getTopItems()['top'],
                ]);
                ?>

            </div>

        </div>

        <?php
        NavBar::end();
        ?>


        <div class="header-mobile container hidden-md hidden-lg">
            <div class="row">
                <div class="col-xs-3">
                    <div class="row mobile_new">
                        <!-- <div class="col-xs-5 text-center cart-wrap">
                            <a href="/cart">
                                <div class="cart-top" data-container=".wrap" data-html="true" data-title="ТОВАРЫ ДОБАВЛЕННЫЕ В КОРЗИНУ" data-toggle="popover" data-placement="bottom" data-content="Корзина пуста" data-original-title="" title=""> -->
                        <!--    <span class="glyphicon glyphicon-shopping-cart">
                                </span>-->
                        <!-- <img class="img" src="/image/shopping_cart.png" height="30px" alt=""> <span class="count badge">0</span>
                                </div>
                            </a>
                        </div> -->
                        <div class="text-right sm-hamburger">

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
                <div class="col-xs-6 logo-wrap text-center">
                    <?php
                    $img = Html::img('/image/logo_03.svg', ['class' => 'img', 'alt' => 'Логотип', 'height' => '46', 'onerror' => "this.src='/image/logo-mobile.png'"]);
                    echo !$isHome ? Html::a($img, ['/']) : $img;
                    ?>
                </div>
                <div class="col-xs-12 sm-menu fixed_bottom_mobile">
                    <?php
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav'],
                        'encodeLabels' => false,
                        'items' => Menu::getTopItems()['bottom'],
                    ]);
                    ?>
                </div>
            </div>
        </div>

        <!-- Fixed header -->
        <div class="header hidden-xs hidden-sm">
            <div class="container middle-line">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-3 logo-wrap">
                        <?php
                        $img = Html::img('/image/logo_03.svg', ['class' => 'img img-responsive', 'alt' => 'Логотип', 'onerror' => "this.src='logo.png'"]);
                        echo !$isHome ? Html::a($img, ['/']) : $img;
                        ?>
                        <!--<img src="/image/logo.png" class="img img-responsive">-->
                    </div>
                    <!--                        <div class="col-xs-12 col-sm-2 work-time hidden-xs col-md-2 col-lg-2">
                                                <p class=""><strong>График работы</strong></p>
<?= Yii::$app->info::get('work_time') ?>
                                            </div>-->
                    <div class="col-xs-12 col-sm-12 col-md-2 office">
                        <div class="city-choise-wrap">

                            <?= \app\modules\city\widgets\CityChoice::widget() ?>

                            <div class="address text-gray">
                                <?= RegionTemplates::getVal('address') ?>
                            </div>
                            <!-- <div class="phone-secondary text-gray">
                                тел: <?php // echo RegionTemplates::getVal('phone-2') 
                                ?>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <div class="work-time">
                            <div class="wt-header">
                                <i class="far fa-clock"></i>
                                ЧАСЫ РАБОТЫ
                            </div>

                            <?php if (Yii::$app->city->id == 1107): ?>
                                <div class="row">
                                    <div class="col-xs-5">
                                        <b>пн-пт:</b>
                                    </div>
                                    <div class="col-xs-7">
                                        09.00-18.00
                                    </div>
                                    <div class="col-xs-5">
                                        <b>сб-вс:</b>
                                    </div>
                                    <div class="col-xs-7">
                                        Выходной
                                    </div>
                                    <!-- <div class="col-xs-5">
                                                        вс:
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <strong>Выходной</strong>
                                                    </div> -->
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
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <div class="sosial-icons">
                            <ul class="nav-justified" style="padding: 0;">
                                <li>
                                    <a href="https://www.youtube.com/c/AxiomaPro/featured" target="_blank">
                                        <img src="/image/ico/Youtube.svg" onmouseover="this.src='/image/ico/Youtube(взаимодействие).svg';" onmouseout="this.src='/image/ico/Youtube.svg';" height="24px">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://instagram.com/axioma.pro.russia?igshid=MTk0NTkyODZkYg%3D%3D&utm_source=qr"
                                        target="_blank">
                                        <img src="/image/ico/Instagram-2.svg" onmouseover="this.src='/image/ico/Instagram(взаимодействие).svg';" onmouseout="this.src='/image/ico/Instagram-2.svg';" height="24px" alt="Instagram">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://vk.com/axioma.pro.russia" target="_blank">
                                        <img src="/image/ico/Вконтакте.svg" onmouseover="this.src='/image/ico/VK(взаимодействие).svg';" onmouseout="this.src='/image/ico/Вконтакте.svg';" height="24px" alt="Вконтакте">
                                    </a>
                                </li>

                                <!-- <li>
                                    <a href="#">
                                        <img src="/image/ico/Telegram.svg" height="24px" alt="Telegram">
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a href="#">
                                        <img src="/image/ico/Skype.svg" height="24px" alt="Skype">
                                    </a>
                                </li> -->
                            </ul>
                            <a href="mailto: <?= Yii::$app->info::get('email') ?>"><i class="fas fa-envelope-square"
                                    style="color: #b8cc76;"></i>
                                <?= Yii::$app->info::get('email') ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 phone-wrap ">
                        <div class="phone text-center">
                            <a href="tel:<?= str_replace(['-', '(', ')', ' '], '', Yii::$app->info::get('headTelephone')) ?>"
                                class="center-block text-center">
                                <?= Yii::$app->info::get('headTelephone') ?>
                            </a>
                        </div>
                        <div class="free-call center-block text-center">Звонок бесплатный</div>
                        <?= \app\modules\forms\widgets\CallBack::widget(); ?>

                    </div>
                    <div class="col-xs-12 col-md-2">
                        <button type="button" id="catalog_button" class="btn btn-primary catalog-button"><i class="fas fa-list"></i> Каталог
                            товаров</button>
                    </div>

                    <div class="col-xs-12 col-md-7 popup-search text-right">
                        <?php echo app\modules\search\widgets\Search::widget(); ?>
                    </div>
                    <div class="col-xs-12 col-md-3 icons-right">
                        <?php
                        echo Nav::widget([
                            'options' => ['class' => 'navbar-nav'],
                            'encodeLabels' => false,
                            'items' => Menu::getTopItems()['bottom'],
                        ]);
                        ?>
                    </div>
                    <?php echo $this->render('_category_menu_small') ?>



                </div>

            </div>
            <div class="middle-line fixed-header" style="display: none;">
                <div class="container">
                    <div class="row scroll-wrap">
                        <div class="col-xs-12 col-md-1">
                            <?php
                            $img = Html::img('/image/ico/mini_logo.svg', ['class' => 'img img-responsive scrolled-logo', 'alt' => 'Логотип', 'onerror' => "this.src='logo.png'"]);
                            echo !$isHome ? Html::a($img, ['/']) : $img;
                            ?>
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <button type="button" class="btn btn-primary catalog-button"><i class="fas fa-list"></i>
                                Каталог товаров</button>
                        </div>

                        <div class="col-xs-12 col-md-6 popup-search text-right">
                            <?php echo app\modules\search\widgets\Search::widget(); ?>
                        </div>
                        <div class="col-xs-12 col-md-3 icons-right">
                            <?php
                            echo Nav::widget([
                                'options' => ['class' => 'navbar-nav'],
                                'encodeLabels' => false,
                                'items' => Menu::getTopItems()['bottom'],
                            ]);
                            ?>
                        </div>
                        <!-- <div class="menu_replace"></div> -->
                        <?php //echo $this->render('_category_menu') 
                        ?>

                    </div>
                </div>
            </div>


            <!-- <div id="top-line" class="bottom-menu">
                <div class="container"> -->

            <?php //echo $this->render('_top_line') 
            ?>

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
            <!-- </div>
            </div> -->
        </div>

        <!-- Fixed header end -->



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
                    <div class="<?= Yii::$app->params['isFluid'] ? 'container' : '' ?>">
                        <div class="row">
                            <div class="col-xs-12 contact-form show-contact">
                                <?php echo app\modules\forms\widgets\Contact::widget(); ?>
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
                        <div class="col-md-2">
                            <p class="title">КАРТА САЙТА</p>

                                    <ul class="list-unstyled list-inline">
                                        <?= Menu::getFooterItems(1) ?>
                                    </ul>
             

                            <!-- <div class="city-choise-wrap">
                
                                <?php // echo \app\modules\city\widgets\CityChoice::widget() ?>

                                <div class="address">
                                    <?php //echo RegionTemplates::getVal('address') ?>
                                </div> -->
                                <!-- <div class="phone-secondary">
                                        тел: <?php // echo RegionTemplates::getVal('phone-2') 
                                        ?>
                                    </div> -->
                                <!-- <div class="button-anchor">
                                    <div class="form-group button-wrap">
                                        <a href="#contact-form" class="scroll-link">
                                            <?php 
                                                // echo Html::Button('Задать вопрос', [
                                                //     'class' => 'btn btn-default',
                                                // ])
                                                ?>
                                        </a>
                                    </div>
                                </div> -->
                            <!-- </div> -->
                        </div>
                        <div class="col-md-2">
                        <p class="title">&nbsp;</p>
           
                        <ul class="list-unstyled list-inline">
                                <?= Menu::getFooterItems(3) ?>
                        </ul>
               
                        </div>
                        <div class="col-md-2">
                        <p class="title">КАТАЛОГ</p>
           
                        <ul class="list-unstyled list-inline">
                                <?= Menu::getFooterItemsNew(2) ?>
                        </ul>
               
                        </div>
                        <div class="col-md-2">
                        <p class="title">&nbsp;</p>
           
                        <ul class="list-unstyled list-inline">
                                <?= Menu::getFooterItemsNewSecond(2) ?>
                        </ul>
               
                        </div>
                        <div class="col-md-offset-2 col-md-2 right-side">
                            <p class="phone">
                                <a
                                    href="tel:<?= str_replace(['-', '(', ')', ' '], '', Yii::$app->info::get('headTelephone')) ?>">
                                    <?= Yii::$app->info::get('headTelephone') ?>
                                </a>
                                <br />
                            </p>
                            <?= \app\modules\forms\widgets\CallBack::widget(); ?>
                            <div class="new_tab_address text-center" style="margin-top:15px">
                                <a href="mailto: <?= Yii::$app->info::get('email') ?>"><i class="fas fa-envelope-square"
                                        style="color: #b8cc76;"></i>
                                    <?= Yii::$app->info::get('email') ?>
                                </a>
                            </div>
                            <?php //echo \app\modules\forms\widgets\CallBackFooter::widget(); ?>
                            <div class="sosial-icons">
                                <ul class="nav-justified" style="padding: 0;">
                                    <li>
                                        <a href="https://www.youtube.com/c/AxiomaPro/featured" target="_blank">
                                            <img src="/image/ico/Youtube.svg" onmouseover="this.src='/image/ico/Youtube(взаимодействие).svg';" onmouseout="this.src='/image/ico/Youtube.svg';" height="24px">
                                        </a>
                                    </li>
                                    <!-- <li>
                                            <a href="#">
                                                <img src="/image/ico/WhatsApp.svg" height="24px" alt="WhatsApp">
                                            </a>
                                        </li> -->
                                    <li>
                                        <a href="https://instagram.com/axioma.pro.russia?igshid=MTk0NTkyODZkYg%3D%3D&utm_source=qr"
                                            target="_blank">
                                            <img src="/image/ico/Instagram-2.png" onmouseover="this.src='/image/ico/Instagram(взаимодействие).svg';" onmouseout="this.src='/image/ico/Instagram-2.svg';" height="24px" alt="Instagram">
                                        </a>
                                    </li>
                                    <li>
                                    <a href="https://vk.com/axioma.pro.russia" target="_blank">
                                        <img src="/image/ico/Вконтакте.svg" onmouseover="this.src='/image/ico/VK(взаимодействие).svg';" onmouseout="this.src='/image/ico/Вконтакте.svg';" height="24px" alt="Вконтакте">
                                    </a>
                                    </li>
                                    <!-- <li>
                                            <a href="#">
                                                <img src="/image/ico/Telegram.svg" height="24px" alt="Telegram">
                                            </a>
                                        </li> -->
                                    <!-- <li>
                                            <a href="#">
                                                <img src="/image/ico/Skype.svg" height="24px" alt="Skype">
                                            </a>
                                        </li> -->
                                    <!-- <li>
                                            <a href="#" target="_blank">
                                                <img src="/image/ico/Яндекс Дзен.svg" height="24px">
                                            </a>
                                        </li> -->
                                </ul>
<!--                                <a href="mailto: --><?php //= Yii::$app->info::get('email') ?><!--"><i class="fas fa-envelope-square"-->
<!--                                        style="color: #b8cc76;"></i>-->
<!--                                    --><?php //= Yii::$app->info::get('email') ?>
<!--                                </a>-->
                            </div>
                            <!-- <p class="insta"> -->
                            <!--                                    <a href="https://www.instagram.com/axioma.pro.russia/" target="_blank">
                                                                        <i class="fab fa-instagram" aria-hidden="true"></i></a>-->
                            <!-- </p> -->
                        </div>
                    </div>
                    <hr>
                    <div class="row footer_center">
                        <div class="col-xs-12 col-sm-2">
                            <div class="city-choise-wrap">

                                <?= \app\modules\city\widgets\CityChoice::widget() ?>

                                <!-- <div class="phone-secondary text-gray">
                                тел: <?php // echo RegionTemplates::getVal('phone-2')
                                ?>
                            </div> -->
                            </div>
                            <div class="footer_city_address">
                                <p>
                                    <?= RegionTemplates::getVal('address') ?>

                                <br>тел: <?php  echo RegionTemplates::getVal('phone-2')
                                    ?></br>
                                </p>
                            </div>

<!--                                    <p>г.-->
<!--                                        --><?php //= RegionTemplates::getVal('city') ?>
<!--
<!--                                    </p>-->
                        </div>
                        <?php echo $this->render('_footer_city') ?>


                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="pull-left">
                        <p><strong>© 2009-
                                <?= date('Y') ?> ООО “Аксиома”
                            </strong>
                            <br>
                            Все правы защищены.
                            <br>
                            Копирование информации разрешено только с письменного согласия администрации сайта.
                        </p>
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


</body>

</html>
<?php $this->endPage() ?>