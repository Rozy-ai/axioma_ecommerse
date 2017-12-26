<?php

/**
 * Created by PhpStorm.
 * User: Irc
 * Date: 02.08.2017
 * Time: 17:01
 */

namespace app\modules\cart;

use yii\web\AssetBundle;

class CartAsset extends AssetBundle {

    public $sourcePath = '@app/modules/cart/assets';
    public $css = [
    ];
    public $js = [
        'js/cart-common.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\assets\AppAsset',
    ];

}
