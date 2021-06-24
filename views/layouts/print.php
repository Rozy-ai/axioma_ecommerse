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

        <table class="table" style="width: 100%">
            <tr>
                <td style="width: 20%; padding-left: 3rem;">
                    <a href="https://axioma.pro/">
                        <?=
                        $img = Html::img('/print/image/logo_print.png', ['class' => 'img', 'alt' => 'Логотип', 'width' => 240]);
                        ?>
                    </a>
                </td>
                <td>    </td>
                <td class="text-right" style="padding-right: 3rem; ">
                    <p style="font-size: 2rem; font-weight: 300;"><?= Yii::$app->info::get('headTelephone') ?></p>
                    <?= Yii::$app->info::get('email') ?>
                </td>
            </tr>
            <tr>
                <td  style="height: 2rem"></td>
            </tr>
            <tr>
                <td style="padding-left: 3rem; width:24%;">
                    <?= Yii::$app->info::get('mos_address') ?>
                </td>
                <td class="text-center" style=" width:24%;">
                    <?= Yii::$app->info::get('ekb_address') ?>
                </td>
                <td class="text-center" style="width:24%;">
                    <?= Yii::$app->info::get('kras_address') ?>
                </td>
                <td class="text-right" style="padding-right: 3rem; width:28%;">
                    <?= Yii::$app->info::get('nvs_address') ?>
                </td>
            </tr>
        </table>

        <div class="wrap">
            <div class="header">
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
