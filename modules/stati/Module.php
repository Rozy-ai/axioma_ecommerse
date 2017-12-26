<?php

namespace app\modules\stati;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\base\BootstrapInterface;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'app\modules\stati\controllers';

    public function init() {
        parent::init();
    }

}
