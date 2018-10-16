<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\widgets\Breadcrumbs;
use app\assets\PrintAsset;
use app\modules\region_templates\models\RegionTemplates;

//print_r(Menu::getTopItems());

PrintAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=1200px">-->
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <div class="header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-4">
                            <?=
                            $img = Html::img('/print/image/logo.png', ['class' => 'img img-responsive', 'alt' => 'Логотип']);
                            ?>
                        </div>
                        <div class="col-xs-7">
                            <div class="row">
                                <div class="col-xs-11">
                                    <p class="phone text-right">
                                        <?= Yii::$app->info::get('headTelephone') ?>
                                    </p>
                                </div>
                                <div class="col-xs-5 ">
                                    <?= Yii::$app->info::get('ekb_address') ?>
                                </div>
                                <div class="col-xs-5 text-right">
                                    <?= Yii::$app->info::get('mos_address') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider" style="background: url('/print/image/slide.png') top center no-repeat; height: 300px;">
                <!--<div class="container-fluid">-->
                <?php Html::img('/print/image/slide.png', ['class' => 'img img-responsive']) ?>
                <!--</div>-->
            </div>
            <div class="advantages">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">

                            <p class="h2 text-center uppercase bold">
                                специальные цены предоставляются в случаях:
                            </p>
                            <br/>
                        </div>

                        <div class="col-xs-3 col-xs-offset-1 text-center ">
                            <?= Html::img('/print/image/cart.png', ['class' => 'img img-responsive center-block']) ?>
                            <br/>
                            <p>
                                <br/>
                                Открытие нового магазина
                            </p>
                        </div>
                        <div class="col-xs-3 text-center">
                            <?= Html::img('/print/image/cart.png', ['class' => 'img img-responsive center-block']) ?>
                            <br/>
                            <p>
                                <br/>
                                Сумма заказа более 200 тыс. рублей
                            </p>
                        </div>
                        <div class="col-xs-3 text-center">
                            <?= Html::img('/print/image/cart.png', ['class' => 'img img-responsive center-block']) ?>
                            <br/>
                            <p>
                                <br/>
                                100% предоплата
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="phrase">
                <div class="container-fluid ">
                    <p class="h2 uppercase bold text-center">предложение ограничено</p>
                </div>

            </div>

            <div class="container-fluid">
                <div class="row">
                    <?= $content ?>
                </div>
            </div>

        </div>

        <?php $this->endBody() ?>

        <!--<script type="text/javascript" src="//cdn.callbackhunter.com/cbh.js?hunter_code=51124a1b34a5d693228b07c3c7665145" charset="UTF-8"></script>-->
    </body>
</html>
<?php $this->endPage() ?>
