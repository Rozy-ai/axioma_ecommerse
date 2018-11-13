<?php

namespace app\models;

use Yii;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;

class CustomAR extends \yii\db\ActiveRecord {

    public function beforeSave($insert) {

        /*
         * Дата создания
         */

        if ($this->hasAttribute('created_at')) {
//            var_dump($this);
            if ($this->isNewRecord)
                $this->created_at = time();
        }

        /*
         * Дата обновления
         */

        if ($this->hasAttribute('updated_at')) {

            $this->updated_at = time();
        }


        return parent::beforeSave($insert);
    }

    // для списков
    public static function __getList() {

        return ArrayHelper::map(self::__getAll(), 'id', 'name');
    }

    // для списков
    public static function __getHeaders() {

        return ArrayHelper::map(self::__getAll(), 'id', 'header');
    }

    public static function __getAll() {

        return self::find()->all();
    }

    public function setWaterMark($_image) {

        $watermarkImage = '@webroot/image/watermark.png';

        if (file_exists($watermarkImage))
            $new_image = Image::watermark('@webroot/' . $_image, $watermarkImage);
        else {
            $_image = '@webroot/image/no_img.jpg';
            $new_image = Image::watermark($_image, $_image);
        }
        $imageData = base64_encode($new_image->get('png'));
        $imageHTML = "data:89504E470D0A1A0A;base64,{$imageData}";

        return $imageHTML;
    }

}
