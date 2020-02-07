<?php

namespace app\modules\image\models;

use Yii;

class Image extends \app\models\ProductImage {

    public function getMain() {
        /*
         * Смотрим были ли изображения
         */

        $model = Image::findAll([
                    'product_id' => $this->product_id,
                    'is_main' => 1,
        ]);

        return $model ? true : false;
    }

    public function afterDelete() {

        $this->setMain();

        return parent::afterDelete();
    }

    public function setMain() {

        /*
         *  Установить главное изображение наобум
         */

        if (!$this->getMain()) {
            $model = Image::find()->all();
            if ($model)
                $model[0]->is_main = 1;
            $model[0]->save();
        }
    }

}
