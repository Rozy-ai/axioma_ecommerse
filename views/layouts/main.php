<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Info;
use yii\bootstrap\ActiveForm;
use app\modules\region_templates\models\RegionTemplates;

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
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => [
                    ['label' => '<span class="glyphicon glyphicon-home"></span>', 'url' => ['/site/index']],
                    ['label' => 'О компании', 'url' => ['/o_kompanii']],
                    ['label' => 'Каталог', 'url' => ['/catalog/default/index']],
                    ['label' => 'Услуги', 'url' => ['/uslugi']],
                    ['label' => 'Вакансии', 'url' => ['/vakansii']],
                    ['label' => 'Новости', 'url' => ['/novosti/default/index']],
                    ['label' => 'Контакты', 'url' => ['/kontaktyi']],
                    ['label' => 'Статьи', 'url' => ['/stati/default/index']],
                    ['label' => '<span class="glyphicon glyphicon-shopping-cart"></span>', 'url' => ['/cart']],
                    Yii::$app->user->isGuest ? ( ''
                            ) : (
                            '<li>'
                            . Html::a('Администрирование', ['/order/admin/index'])
                            . '</li>' .
                            '<li>'
                            . Html::beginForm(['/auth/default/logout'], 'post')
                            . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                            )
                ],
            ]);
            NavBar::end();
            ?>

            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 logo-wrap">
                            <?php
                            $img = Html::img('/image/logo.svg', ['class' => 'img img-responsive', 'alt' => 'Логотип']);
                            echo!$isHome ? Html::a($img, ['/']) : $img;
                            ?>
                            <!--<img src="/image/logo.png" class="img img-responsive">-->
                            <p class="slogan">СИСТЕМЫ ПРЕДОТВРАЩЕНИЯ КРАЖ</p>
                        </div>
                        <div class="col-xs-12 col-sm-3 text-center">
                            <?= app\modules\cart\widgets\CartWidget::widget(); ?>
                            <?php \app\modules\city\widgets\CityChoice::widget(); ?>
                            <?php Yii::$app->city->get(); ?>
                            <?php Yii::$app->city->getId(); ?>

                        </div>
                        <div class="col-xs-12 col-sm-3 text-right">
                            <p class="phone"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <a href="tel:<?= Info::get(3) ?>"><?= Info::get(3) ?></a></p>
                            <?= \app\modules\forms\widgets\CallBack::widget(); ?>
                            <?php ActiveForm::begin(['method' => 'get', 'action' => '/search/default/index', 'id' => 'popup-search']); ?>
                            <div class="row">
                                <div class="col-xs-12 search">
                                    <div class="input-group">
                                        <input  name="q" type="text" class="form-control" placeholder="Поиск..">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div><!-- /.col-lg-6 -->
                            </div><!-- /.row -->
                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>
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
                                <li><a href="///home/kognitiv/NetBeansProjects/axioma">Главная</a></li>
                                <li><a href="/o_kompanii">О компании</a></li>
                                <li><a href="/produktsiya">Каталог оборудования</a></li>
                                <li><a href="/vakansii">Вакансии</a></li>
                                <li><a href="/novosti">Новости</a></li>
                                <li><a href="/kontaktyi">Контакты</a></li>
                                <li><a href="/stati">Статьи</a></li>
                                <li><a href="/soglaschenie">Соглашение о конфиденциальности личных данных</a></li>
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
        <?= \app\modules\options\models\Options::getVal('counters') ?>

        <?php $this->endBody() ?>

        <script type="text/javascript" src="//cdn.callbackhunter.com/cbh.js?hunter_code=51124a1b34a5d693228b07c3c7665145" charset="UTF-8"></script>
    </body>
</html>
<?php $this->endPage() ?>
