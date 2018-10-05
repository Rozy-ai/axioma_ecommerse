<?php

namespace app\modules\products\models;

use Yii;

class Product extends \app\models\Product {

    const IMAGE_PATH = '/image/catalog/';

    public function getImage() {

        foreach ($this->productImages as $image):

            if ($image->is_main)
                return self::IMAGE_PATH . $image->image;

        endforeach;

        return false;
    }

    public function getShowPrice() {

        return $this->price ?
                $this->price . ' <i class="fa fa-rub" aria-hidden="true"></i>' :
                ' по запросу';
    }

}
