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
                        ->where(['category_id' => $this->id, 'is_enable' => 1])
                        ->orWhere(['like', 'cats', "%{$this->id}%", false])
                        ->orderBy(['ord' => SORT_DESC])
                        ->all();
    }

    public function getBreadCrumbs() {

        $url = explode('/', $this->url);
//        print_r($url);
//        exit();
//
        if (count($url) > 0) {

            $result[] = ['url' => '/catalog', 'label' => 'Каталог'];
            $_url = '';

            for ($i = 1; $i < count($url); $i++) {

                $_url .= '/' . $url[$i - 1];
                $_url[0] = $_url[0] == '/' ? ' ' : $_url[0];
//                $_url = substr_replace($url, '', strlen($url)-1, 1);
                $result[] = ['url' => '/category/' . trim($_url), 'label' => $this->getByUriName(trim($_url))];
//                echo $_url . PHP_EOL;
//                print_r(Category::find()->where(['uri' => trim($_url)])->one());
            }
        }

        return isset($result) ? $result : false;
    }

    public static function getByUriName($uri) {

        return ($model = self::find()->where(['url' => $uri])->one()) ? $model->header : '';
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
