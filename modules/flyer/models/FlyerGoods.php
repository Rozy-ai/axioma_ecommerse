<?php

namespace app\modules\flyer\models;

use Yii;
use vova07\fileapi\behaviors\UploadBehavior;

class FlyerGoods extends \app\models\FlyerGoods {

    const PATH = '/image/flyer/';

    public function behaviors() {
        return [
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@webroot/image/flyer',
                        'tempPath' => '@webroot/image/flyer',
                        'url' => '/image/flyer/'
                    ],
                ]
            ]
        ];
    }

    public function getImg() {

        return self::PATH . $this->image;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct() {
        return $this->hasOne(\app\modules\products\models\Product::className(), ['id' => 'product_id']);
    }

}
