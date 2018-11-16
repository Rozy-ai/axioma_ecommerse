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

    public function setWaterMark($_image, $size = 1200) {

        $_image_tmp = $_image;

        $_image = str_replace('//', '/', Yii::getAlias('@webroot') . $_image);

        $watermarkImage = Yii::getAlias('@webroot') . '/image/watermark.png';

        $image_ready = Yii::getAlias('@webroot') . '/image/ready/' . basename($_image);

        if (!file_exists($image_ready)) {
            if (!$_image_tmp || !file_exists($_image)) {
                $_image = Yii::getAlias('@webroot') . '/image/no_img.jpg';
                $new_image = Image::watermark($_image, $_image);
            } else {

                $sizes = getimagesize($_image);
//            Yii::error($sizes);
                $wm = Image::thumbnail($watermarkImage, $sizes[0], $size[1]);

                $watermarkImage = Yii::getAlias('@webroot') . '/image/watermark_' . $sizes[0] . '.png';
                $wm->save($watermarkImage);

                $new_image = Image::watermark($_image, $watermarkImage);
            }
//        $new_image = $new_image->resize($new_image->get('png'), $size);
            $new_image = Image::thumbnail($new_image, $size, $size);
            $new_image->save($image_ready);
        }

        return '/image/ready/' . basename($_image);
    }

}
