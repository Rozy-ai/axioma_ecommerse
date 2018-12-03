<?php

namespace app\modules\category\models;

use Yii;
use yii\imagine\Image;
use vova07\fileapi\behaviors\UploadBehavior;
use corpsepk\yml\behaviors\YmlCategoryBehavior;

class Category extends \app\models\Category {

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
            ],
            'ymlCategory' => [
                'class' => YmlCategoryBehavior::className(),
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->select(['id', 'header', 'parent_id']);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return [
                        'id' => $model->id,
                        'name' => $model->header,
                        'parentId' => $model->parent_id
                    ];
                }
            ],
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

        $model = self::find()->orderBy([
                    'in_home_order' => SORT_DESC,
                ])->where(['show_in_home' => 1])
                ->all();

        return $model ? $model : false;
    }

    public static function getByUrl($url) {

        return ($model = self::find()->where(['url' => $url]
                )->one()) ? $model : false;
    }

    public function getImg($size = 1600) {

        if ($this->image)
            return $this->setWaterMark('/image/category/' . $this->image, $size);
    }

    public function getIco() {

        return '/image/category/' . $this->ico;
    }

    public function getParent() {
        return $this->hasOne(self::className(), ['id' => 'parent_id']);
    }

    public function getProducts() {

        return \app\modules\catalog\models\Catalog::find()
                        ->where(['category_id' => $this->id])
                        ->orWhere(['like', 'cats', "%{$this->id}%", false])
                        ->orderBy(['ord' => SORT_DESC])
                        ->all();
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
