<?php

namespace app\modules\image\widgets;

use yii\base;
use yii\base\Widget;

class ImageUpload extends Widget {

    public $priduct_id;

    public function init() {

        parent::init();
    }

    public function run() {


        return $this->render('image_upload', [
//                    'conent' => $model->content,
        ]);
    }

}
