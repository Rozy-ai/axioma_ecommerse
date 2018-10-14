<?php

namespace app\modules\flyer\models;

use Yii;

class Flyer extends \app\models\Flyer {

    public function getFlyerGoods() {
        return $this->hasMany(FlyerGoods::className(), ['flyer_id' => 'id']);
    }

}
