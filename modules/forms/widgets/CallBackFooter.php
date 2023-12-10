<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
//use app\modules\forms\models;
use yii\helpers\Html;

class CallBackFooter extends Widget {

    public $in_footer = false;

    public function run() {

        $model = new \app\modules\forms\models\CallBackForm;

        return $this->render('call_back_footer', [
                    'model' => $model,
                    'in_footer' => $this->in_footer,
        ]);
    }

}
