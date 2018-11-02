<?php

namespace app\modules\flyer\models;

use Yii;
use vova07\fileapi\behaviors\UploadBehavior;
use yii\imagine\Image;

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

        $new_image = Image::resize('@webroot/' . self::PATH . $this->image, '800', '800');
        $save_path = Yii::getAlias('@app') . '/web/image/flyer/thumb/' . $this->image;
        $new_image->save($save_path);
//        $imageData = base64_encode($new_image->get('jpg'));
//        $imageHTML = "data:89504E470D0A1A0A;base64,{$imageData}";
//        return $imageHTML;
        return self::PATH . 'thumb/' . $this->image;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct() {
        return $this->hasOne(\app\modules\products\models\Product::className(), ['id' => 'product_id']);
    }

}
