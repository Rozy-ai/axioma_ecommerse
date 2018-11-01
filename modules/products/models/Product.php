<?php

namespace app\modules\products\models;

use Yii;
use yii\bootstrap\Html;

class Product extends \app\models\Product {

    const IMAGE_PATH = '/image/catalog/';

    public function getImage() {

        $_image = false;

        foreach ($this->productImages as $image):

            if ($image->is_main)
                $_image = self::IMAGE_PATH . $image->image;

        endforeach;

        if ($_image)
            return $this->setWaterMark($_image);

        return false;
    }

    public function getShowPrice() {

        return $this->price ?
                $this->price . ' <i class="fa fa-rub" aria-hidden="true"></i>' :
                ' по запросу';
    }

    public function getCategoryLink() {

        return Html::a($this->category->header
                        , ['/category/' . $this->category->url]);
    }

    public function getProductImages() {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

}
