<?php
/**
 * Created by PhpStorm.
 * User: Irc
 * Date: 10.07.2017
 * Time: 12:53
 */

namespace app\modules\slider;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\base\BootstrapInterface;


class Module extends \yii\base\Module
{

    public $controllerNamespace = 'app\modules\slider\controllers';

    public function init()
    {
        parent::init();
    }

}