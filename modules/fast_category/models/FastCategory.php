<?php

namespace app\modules\fast_category\models;

use Yii;
use vova07\fileapi\behaviors\UploadBehavior;

class FastCategory extends \app\models\FastCategory {

    public function behaviors() {
        return [
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@webroot/image/category',
                        'tempPath' => '@webroot/image/category',
                        'url' => '/image/category/'
                    ],
                ]
            ],
        ];
    }

    public static function getRoot() {

        return ($model = self::find()->where(['is_enable' => 1]
                )->all()) ? $model : false;
    }

    public static function getByUrl($url) {

        return ($model = self::find()->where(['url' => $url]
                )->one()) ? $model : false;
    }

    public function getImg($size = 1600) {

        if ($this->image)
            return $this->setWaterMark('/image/category/' . $this->image, $size);
    }

}
