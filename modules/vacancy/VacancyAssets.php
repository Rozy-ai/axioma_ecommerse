<?php

/**
 * Created by PhpStorm.
 * User: Irc
 * Date: 02.08.2017
 * Time: 17:01
 */

namespace app\modules\vacancy;

use yii\web\AssetBundle;

class VacancyAssets extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/vacancy/assets';
    public $css = [
        'css/vacancy.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\assets\AppAsset',
    ];

}
