<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
use yii\helpers\Html;

class Contact extends Widget {

    public $path;

    public function init() {

        parent::init();
    }

    public function run() {
        
        $model = new \app\modules\forms\models\ContactForm();
        if($this->path == 'home'){
            return $this->render('contact_form_home', [
                'model' => $model,
        ]);
        } else {
            return $this->render('contact_form', [
                'model' => $model,
            ]);
        }

    }

}
