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
        <?=
        // Свои метатеги
        RegionTemplates::getInHeader();
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
                    'class' => 'navbar-inverse navbar-fixed-top main-navbar',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'encodeLabels' => false,
                'items' => Menu::getTopItems()['top'],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => Menu::getTopItems()['bottom'],
            ]);
            NavBar::end();
            ?>

            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-3 logo-wrap">
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
                        <div class="col-xs-12 col-sm-10 col-md-9 office">
                            <div class="row">
                                <div class="col-xs-12 col-sm-9 address-line">
                                    <div class="row">
                                        <div class="hidden-xs col-xs-12">
                                            <p class="pull-right"><strong>Офис-склад</strong></p>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 mos text-right">
                                            <?= Yii::$app->info::get('mos_address') ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 ekb text-right">
                                            <?= Yii::$app->info::get('ekb_address') ?>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 kras text-right">
                                            <?= Yii::$app->info::get('kras_address') ?>
                                        </div>
                                        <!--                                <div class="col-xs-12 hidden-md hidden-sm hidden-lg">
                                                                            <p class=""><strong>График работы</strong></p>
                                        <?= Yii::$app->info::get('work_time') ?>
                                                                        </div>-->

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 phone-wrap" >
                                    <div class="phone">
                                        <a href="tel:<?= Yii::$app->info::get('headTelephone') ?>">
                                            <?= Yii::$app->info::get('headTelephone') ?>
                                        </a>
                                        <?= \app\modules\forms\widgets\CallBack::widget(); ?>
                                        <div class="work-time">
                                            <?= Yii::$app->info::get('work_time') ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?= app\modules\search\widgets\Search::widget() ?>

            <?php if ($isHome): ?>
                <div class="container-fluid">
                    <!--<div class="row">-->
                    <?= $content ?>
                    <!--</div>-->
                </div>
            <?php else: ?>
                <div class="container">
                    <div class="content">
                        <?=
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                        <?= Alert::widget() ?>
                        <div id="content">
                            <?= $content ?>
                        </div>
                    </div>
                </div>

                <div class="thanks-contact-form">
                    <!--<div class="row">-->
                    <div class="container">
                        <div class="viewed-goods">
                            <?= \app\modules\catalog\widgets\ViewedGoods::widget(); ?>
                        </div>

                        <!--<div class="col-xs-12 col-sm-8 thanks">-->
                        <?php // app\modules\thanks\widgets\ThanksList::widget();  ?>
                        <!--</div>-->
                        <!--<div class="col-xs-12 col-sm-4 contact-form">-->
                        <?php // app\modules\forms\widgets\Contact::widget();  ?>
                        <!--</div>-->

                        <!--<div class="slider">-->
                        <?php //\app\modules\slider\widgets\MainSlider::widget();  ?>
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
                            <?= Yii::$app->info::get('mos_address') ?>
                            <?= Yii::$app->info::get('ekb_address') ?>
                            <?= Yii::$app->info::get('kras_address') ?>
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
                            <?= Yii::$app->info::get('ekb_address') ?>
                            <?= Yii::$app->info::get('mos_address') ?>
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
                            <?= \app\modules\forms\widgets\CallBack::widget(); ?>
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
                        if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false):
                            echo Yii::$app->info::get('counters');
                        endif;
                        ?>
                    </div>
                </div>
            </div>

            <a href="#" class="footer-up" onclick="$('html, body').stop().animate({scrollTop: 0}, 800, 'swing'); return false;">Наверх &nbsp; <i class="fa fa-angle-up" aria-hidden="true"></i></a>

        </footer>

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
