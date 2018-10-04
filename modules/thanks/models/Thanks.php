<?php

namespace app\modules\thanks\models;

use Yii;
use vova07\fileapi\behaviors\UploadBehavior;

class Thanks extends \app\models\Thanks {

    const PATH = '/image/thanks/';

    public function behaviors() {
        return [
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@webroot/image/thanks',
                        'tempPath' => '@webroot/image/thanks',
                        'url' => '/image/thanks/'
                    ],
                ]
            ]
        ];
    }

    public function getImg() {

        return self::PATH . $this->image;
    }

}
