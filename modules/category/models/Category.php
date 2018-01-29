<?php

namespace app\modules\category\models;

use Yii;

class Category extends \app\models\Category {

    public $products = [];

    public function beforeValidate() {

        $this->created_at = time();
        return parent::beforeValidate();
    }

    public static function getList() {

        $result[] = 'Не указан';

        $model = self::find()->orderBy(['ord' => SORT_DESC])->all();

        foreach ($model as $item):

            $result[$item->id] = $item->title;

        endforeach;

        return $result ? $result : false;
    }

    public function getChilds() {
        return $this->hasMany(self::className(), ['parent_id' => 'id']);
    }

    public static function getRoot() {

        $model = self::find()->where(['parent_id' => 187, 'show' => 1])->orderBy(['ord' => SORT_DESC])->all();

        return $model ? $model : false;
    }

    public static function getByUri($uri) {

        return ($model = self::find()->where(['uri' => $uri])->one()) ? $model : false;
    }

    public static function getByUriName($uri) {

        return ($model = self::find()->where(['uri' => $uri])->one()) ? $model->title : '';
    }

    public function getBreadCrumbs() {

        $url = explode('/', $this->uri);
//        print_r($url);
//        exit();
//
        if (count($url) > 0) {

            $result[] = ['url' => '/catalog/', 'label' => 'Каталог'];
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

    public function getProducts() {

        $model = self::findOne(['id' => $this->id]);
//        print_r($model);

        if ($model) {

            $products = $this->_getProducts($model->id);
//            print_r($products);
            $this->products = array_merge($this->products, $products);

//            print_r($this->products); exit();

            $this->collectIds($model->id);

            return \app\modules\catalog\models\Catalog::find()
                            ->where(['id' => $this->products])
                            ->orderBy(['ord' => SORT_DESC])->all();
        }

        return false;
    }

    public function collectIds($id) {

        $model = self::findAll(['parent_id' => $id]);

//        print_r($model);

        if ($model) {

            foreach ($model as $item):

//                echo $item->title.' '.$item->id;

                $products = $this->_getProducts($item->id);

//                print_r($products);

                $this->products = array_merge($this->products, $products);

                $this->collectIds($item->id);

            endforeach;
        } else
            return false;
    }

    public static function _getProducts($id) {

//        print_r($id); exit;

        return \app\modules\catalog\models\Catalog::find()
                        ->select(['id'])
                        ->where(['cat_main' => $id])
                        ->orWhere(['like', 'cats', "%{$id}%", false])
                        ->orderBy(['ord' => SORT_DESC])
                        ->asArray()
                        ->all();
    }

}
