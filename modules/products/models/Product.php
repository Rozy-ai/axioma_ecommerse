<?php

namespace app\modules\products\models;

use Yii;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

class Product extends \app\models\Product {

    const IMAGE_PATH = '/image/catalog/';

    public $supported_products;

    public function rules() {
        $array = parent::rules();

        $array[] = [['supported_products'], 'safe'];

        return $array;
    }

    public function attributeLabels() {
        $labels = parent::attributeLabels();

        $labels['supported_products'] = 'Сопутствующие товары';

        return $labels;
    }

    public function beforeValidate() {

//        echo ' - ' . $this->id . PHP_EOL;
//        $this->primaryKey = $this->id;

        $this->cats = serialize($this->cats);

        if ($this->supported_products && is_array($this->supported_products)) {

            \app\models\SupportedGoods::deleteAll([
                'parent_product_id' => $this->id,
            ]);

            foreach ($this->supported_products as $product):
                $model = new \app\models\SupportedGoods();
                $model->parent_product_id = $this->id;
                $model->child_product_id = $product;
                $model->save();
            endforeach;

            $this->supported_products = '';
        }

        return parent::beforeValidate();
    }

    public function afterSave($insert, $changedAttributes) {


        return parent::afterSave($insert, $changedAttributes);
    }

    public function afterFind() {

        // связанные товары
        $model = \app\models\SupportedGoods::findAll([
                    'parent_product_id' => $this->id,
        ]);

        $this->supported_products = ArrayHelper::getColumn($model, 'child_product_id');
        $this->cats = unserialize($this->cats);


        return parent::afterFind();
    }

    public function getImage() {

        $_image = false;

        foreach ($this->productImages as $image):

            if ($image->is_main)
                $_image = self::IMAGE_PATH . $image->image;

        endforeach;

        return $this->setWaterMark($_image);
    }

    public function getShowPrice() {

        return $this->price ?
                Yii::$app->formatter->asCurrency($this->price) :
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
