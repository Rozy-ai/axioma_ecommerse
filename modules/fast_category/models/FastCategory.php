<?php

namespace app\modules\fast_category\models;

use Yii;
use vova07\fileapi\behaviors\UploadBehavior;
use yii\helpers\Url;

class FastCategory extends \app\models\FastCategory {

    const URL_PATH = '/category/';
    const ICON_PATH = '/image/fast-cat/';

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
                ]
            ],
        ];
    }

    public static function getRoot() {

        return ($model = self::find()
                        ->orderBy('ord DESC')
                        ->where(['is_enable' => 1]
                        )->all()) ? $model : false;
    }

    public static function getByUrl($url) {

        return ($model = self::find()->where(['url' => $url]
                )->one()) ? $model : false;
    }

    public function getImg($size = 1600) {

        if ($this->image)
            return $this->setWaterMark('/image/category/' . $this->image, $size);
    }

    public function get_url() {

        return Url::to(self::URL_PATH . $this->url);
    }

    public function get_icon() {

        return Url::to(self::ICON_PATH . $this->id . '.svg');
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

}
