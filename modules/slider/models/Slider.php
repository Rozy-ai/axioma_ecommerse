<?php

namespace app\modules\slider\models;

use Yii;
use vova07\fileapi\behaviors\UploadBehavior;

class Slider extends \app\models\Slider {

    public function behaviors() {
        return [
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@webroot/image/slider',
                        'tempPath' => '@webroot/image/slider',
                        'url' => '/image/slider/'
                    ],
                ]
            ],
        ];
    }

    public function getImg() {

        return '/image/slider/' . $this->image;
    }

}
