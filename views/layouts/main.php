<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use app\components\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Info;
use yii\bootstrap\ActiveForm;
use app\modules\region_templates\models\RegionTemplates;
use app\modules\menu\models\Menu;

//print_r(Menu::getTopItems());

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
        <?php $this->beginBody() ?>

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
                        <div class="col-xs-12 col-sm-3 logo-wrap">
                            <?php
                            $img = Html::img('/image/logo.png', ['class' => 'img img-responsive', 'alt' => 'Логотип']);
                            echo!$isHome ? Html::a($img, ['/']) : $img;
                            ?>
                            <!--<img src="/image/logo.png" class="img img-responsive">-->
                            <p class="slogan">СИСТЕМЫ ПРЕДОТВРАЩЕНИЯ КРАЖ</p>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <p class=""><strong>График работы</strong></p>
                            <?php if ($work_time = Yii::$app->options::getVal('work_time')): ?>
                                <?= $work_time ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <p class=""><strong>Офис-склад</strong></p>
                            <p>
                                Екатеринбург<br/>
                                ул. Минометчиков 17, офис 4. <br/>
                                Телефоны: +7 (343) 204-95-10
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <p>
                                <br/>
                                Москва<br/>
                                ул. Чагинская , д. 4, оф. 17. <br/>
                                Телефоны: +7 (495) 123-34-41
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-3 text-right">
                            <p class="phone">
                                <a href="tel:<?= Info::get(3) ?>"><?= Info::get(3) ?></a><br/>
                            </p>
                            <?= \app\modules\forms\widgets\CallBack::widget(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="search-wrap">
                <div class="container">
                    <?php ActiveForm::begin(['method' => 'get', 'action' => '/search', 'id' => 'popup-search']); ?>
                    <div class="row">
                        <div class="col-xs-12 search">
                            <div class="input-group">
                                <input name="q" type="text" class="form-control q" placeholder="Поиск..">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                    <?php ActiveForm::end(); ?>
                </div>
            </div>

            <?php if ($isHome): ?>
                <div class="container-fluid">
                    <div class="row">
                        <?= $content ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="container">
                    <div class="content">
                        <?=
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                        <div id="content">
                            <?= $content ?>
                        </div>

                        <div class="viewed-goods">
                            <?= \app\modules\catalog\widgets\ViewedGoods::widget(); ?>
                        </div>
                        <!--<div class="slider">-->
                        <?= \app\modules\slider\widgets\MainSlider::widget(); ?>
                        <!--</div>-->
                    </div>
                </div>

            <?php endif; ?>



        </div>

        <footer class="footer">

            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <?php //app\modules\menu\widgets\FooterMenu::widget();   ?>

                            <ul class="list-unstyled list-inline">
                                <li><a href="/">Главная</a></li>
                                <?= Menu::getFooterItems() ?>
                                <!--<li><a href="/soglaschenie">Соглашение о конфиденциальности личных данных</a></li>-->
                            </ul>

                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <?= Info::get(4) ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <p><?= Info::get(1) ?></p>
                </div>
            </div>

            <a href="#" class="footer-up" onclick="$('html, body').stop().animate({scrollTop: 0}, 800, 'swing'); return false;">Наверх &nbsp; <i class="fa fa-angle-up" aria-hidden="true"></i></a>

        </footer>
        <?php
        if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false):
            echo \app\modules\options\models\Options::getVal('counters');
        endif;
        ?>
        <?php $this->endBody() ?>

        <script type="text/javascript" src="//cdn.callbackhunter.com/cbh.js?hunter_code=51124a1b34a5d693228b07c3c7665145" charset="UTF-8"></script>
    </body>
</html>
<?php $this->endPage() ?>
