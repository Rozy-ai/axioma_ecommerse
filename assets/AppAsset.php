<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/slick.css',
        'css/slick-theme.css',
        'css/owl/owl.carousel.min.css',
        'css/owl/owl.theme.default.min.css',
        'css/jBox/jBox.css',
        'css/jBox/jBox.Notice.css',
    ];
    public $js = [
        'js/common.js',
        'js/slick.min.js',
        'js/owl.carousel.min.js',
        '//use.fontawesome.com/2feef9962c.js',
        'css/jBox/jBox.min.js',
        'css/jBox/jBox.Notice.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
