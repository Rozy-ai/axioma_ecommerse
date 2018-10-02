<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
use yii\helpers\Html;

class Contact extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = new \app\modules\forms\models\ContactForm();

        return $this->render('contact_form', [
                    'model' => $model,
        ]);
    }

}
