<?php

namespace app\modules\flyer\models;

use Yii;

class Flyer extends \app\models\Flyer {

    public static $BANNER = [
        '/image/slider/slide_3.jpg' => 'Радио',
        '/image/slider/slide_6.jpg' => 'Акустика',
    ];

    public function getFlyerGoods() {
        return $this->hasMany(FlyerGoods::className(), ['flyer_id' => 'id']);
    }

    public function beforeDelete() {

        FlyerGoods::deleteAll(['flyer_id' => $this->id]);

        return parent::beforeDelete();
    }

}
