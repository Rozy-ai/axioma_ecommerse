<?php

namespace app\modules\flyer\models;

use Yii;

class FlyerGoods extends \app\models\FlyerGoods {

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct() {
        return $this->hasOne(\app\modules\products\models\Product::className(), ['id' => 'product_id']);
    }

}
