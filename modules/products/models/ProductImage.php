<?php

namespace app\modules\products\models;

use Yii;

class ProductImage extends \app\models\ProductImage {

    public function getImage() {

        return $this->setWaterMark('/image/catalog/' . $this->image);
    }

}
