<?php

namespace app\modules\novosti;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\base\BootstrapInterface;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'app\modules\novosti\controllers';

    public function init() {
        parent::init();
    }

}
