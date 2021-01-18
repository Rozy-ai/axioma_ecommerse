<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;
use app\models\Info;
use app\widgets\Alert;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => '',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse  navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Заказы', 'url' => ['/order/admin/index']],
//                    ['label' => 'Каталог', 'url' => ['#'], 'items' => [
//                            ['label' => 'Категории', 'url' => ['/category/admin/index']],
//                            ['label' => 'Продукция', 'url' => ['/products/admin/index']],
//                        ],],
                    ['label' => 'Быстрые категории', 'url' => ['/fast_category/admin/index']],
                    ['label' => 'Категории', 'url' => ['/category/admin/index']],
                    ['label' => 'Продукция', 'url' => ['/products/admin/index']],
                    ['label' => 'Рекламные листовки', 'url' => ['/flyer/admin/index']],
                    ['label' => 'SEO', 'url' => ['#'], 'items' => [
                            ['label' => 'Города', 'url' => ['/city/admin/index']],
                            ['label' => 'Имена меток', 'url' => ['/shortcode/admin/index']],
                            ['label' => 'Метки', 'url' => ['/region_templates/admin/index']],
                            ['label' => 'Опции', 'url' => ['/options/admin/index']],
                            ['label' => 'Шаблоны title|description', 'url' => ['/seo_template/admin/index']],
                            ['label' => 'Robots.txt', 'url' => ['/robots/admin/index']],
                        ]],
                    ['label' => 'Контент', 'url' => ['#'], 'items' => [
                            ['label' => 'Меню', 'url' => ['/menu/admin/index']],
                            ['label' => 'Слайдер', 'url' => ['/slider/admin/index']],
                            ['label' => 'Страницы', 'url' => ['/content/page/index']],
                            ['label' => 'Новости', 'url' => ['/content/news/index']],
                            ['label' => 'Статьи', 'url' => ['/content/articles/index']],
                            ['label' => 'Услуги', 'url' => ['/content/services/index']],
                            ['label' => 'ИнфоБлоки', 'url' => ['/info/admin/index']],
                            ['label' => 'Портфолио', 'url' => ['/portfolio/admin/index']],
                            ['label' => 'Рекомендации', 'url' => ['/thanks/admin/index']],
                            ['label' => 'Вакансии', 'url' => ['/vacancy/admin/index']],
                        ]],
                    ['label' => 'Пароль', 'url' => ['/user/admin/update/1']],
                    Yii::$app->user->isGuest ? (
                            ['label' => 'Login', 'url' => ['/auth/default/login']]
                            ) : (
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

            <div class="container-fluid">
                <?= Alert::widget() ?>
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>

        </div>
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>


        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
