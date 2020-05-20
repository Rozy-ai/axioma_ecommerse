<?php

/**
 * Created by PhpStorm.
 * User: Irc
 * Date: 02.08.2017
 * Time: 17:01
 */

namespace app\modules\portfolio;

use yii\web\AssetBundle;

class Asset extends AssetBundle {

    public $publishOptions = [
        'forceCopy' => YII_DEBUG //DEV
    ];
    public $sourcePath = '@app/modules/portfolio/assets';
    public $css = [
        'css/portfolio.css'
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\assets\AppAsset',
    ];

}
