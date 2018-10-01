<?php

namespace app\modules\portfolio\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\page\models\Page;

class ImageUpload extends Widget {

    public $source_id;

    public function init() {

        parent::init();
    }

    public function run() {


        return $this->render('image_upload', [
//                    'conent' => $model->content,
        ]);
    }

}
