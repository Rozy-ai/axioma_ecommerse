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
                            <a href="https://axioma.pro/">
                                <?=
                                $img = Html::img('/print/image/logo_print.png', ['class' => 'img img-responsive', 'alt' => 'Логотип']);
                                ?>
                            </a>
                        </div>
                        <div class="col-xs-7">
                            <div class="row">
                                <div class="col-xs-11">
                                    <p class="phone text-right">
                                        <?= Yii::$app->info::get('headTelephone') ?>
                                    </p>
                                </div>
                                <div class="col-xs-5 ">
                                    <?= Yii::$app->info::get('mos_address') ?>
                                </div>
                                <div class="col-xs-5 text-right">
                                    <?= Yii::$app->info::get('ekb_address') ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
