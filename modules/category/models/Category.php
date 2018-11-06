<?php

namespace app\modules\category\models;

use Yii;
use yii\imagine\Image;
use vova07\fileapi\behaviors\UploadBehavior;

class Category extends \app\models\Category2 {

    public $products = [];

    public function behaviors() {
        return [
            'uploadBehavior' => [
                'class' => UploadBehavior::className(),
                'attributes' => [
                    'image' => [
                        'path' => '@webroot/image/category',
                        'tempPath' => '@webroot/image/category',
                        'url' => '/image/category/'
                    ],
                    'ico' => [
                        'path' => '@webroot/image/category',
                        'tempPath' => '@webroot/image/category',
                        'url' => '/image/category/'
                    ],
                ]
            ]
        ];
    }

    public static function getList() {

        $result[] = 'Не указан';

        $model = self::find()->orderBy(['ord' => SORT_DESC])->all();

        foreach ($model as $item):

            $result[$item->id] = $item->header;

        endforeach;

        return $result ? $result : false;
    }

    public static function getRoot() {

        $model = self::find()->orderBy(['header' => SORT_ASC])->all();

        return $model ? $model : false;
    }

    public static function getByUrl($url) {

        return ($model = self::find()->where(['url' => $url]
                )->one()) ? $model : false;
    }

    public function getProducts() {

        return \app\modules\products\models\Product::findAll([
                    'category_id' => $this->id,
        ]);
    }

    public function getImg() {

        if ($this->image)
            return $this->setWaterMark('/image/category/' . $this->image);
    }

    public function getIco() {

        return '/image/category/' . $this->ico;
    }

//    public function getIco() {
//
//        $image = Image::getImagine();
//        $newImage = $image->open(Yii::getAlias('@webroot/image/category/' . $this->image));
//        $newImage->effects()->grayscale()->gamma(.3);
//        $imageData = base64_encode($newImage->get('png'));
//        $imageHTML = "data:89504E470D0A1A0A;base64,{$imageData}";
//
//        return $imageHTML;
//    }
}
