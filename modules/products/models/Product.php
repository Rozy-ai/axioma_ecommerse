<?php

namespace app\modules\products\models;

use Yii;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use corpsepk\yml\behaviors\YmlOfferBehavior;
use corpsepk\yml\models\Offer;
use app\modules\category\models\Category;
use yii\helpers\Url;

class Product extends \app\models\Product {

    const IMAGE_PATH = '/image/catalog/';

    public $supported_products;

    public function behaviors() {
        return [
            'ymlOffer' => [
                'class' => YmlOfferBehavior::className(),
                'scope' => function ($model) {
                    /** @var \yii\db\ActiveQuery $model */
                    $model->andWhere(['is_enable' => true]);
                },
                'dataClosure' => function ($model) {
                    /** @var self $model */
                    return new Offer([
                        'id' => $model->id,
                        'url' => $model->getUrl(true), // absolute url e.g. http://example.com/item/1256
                        'price' => $model->price,
                        'currencyId' => 'RUR',
                        'categoryId' => $model->category_id,
//                        'picture' => $model->cover ? $model->cover->getUrl() : null,
                        /**
                         * Or as array
                         * don't forget that yandex-market accepts 10 pictures max
                         * @see https://yandex.ru/support/partnermarket/picture.xml
                         */
//                        'picture' => ArrayHelper::map($model->images, 'id', function ($image) {
//                                    return $image->getUrl();
//                                }),
                        'name' => $model->header,
//                        'vendor' => $model->brand ? $model->brand->name : null,
                        'description' => $model->content_info,
                    ]);
                }
            ],
        ];
    }

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
//        Yii::error($this->cats);
        $this->cats = serialize($this->cats);
//        Yii::error($this->cats);

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

//        $this->supported_products = '';

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

    public function getImage($size = 1200) {

        $_image = false;

        foreach ($this->productImages as $image):

            if ($image->is_main)
                $_image = self::IMAGE_PATH . $image->image;

        endforeach;

        return $this->setWaterMark($_image, $size);
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

    public static function getByUrl($url) {


        return ($model = self::find()->where(['url' => $url]
                )->
                andWhere(['is_enable' => 1])
                ->one()) ? $model : false;
    }

    public function getBreadCatLink() {

        $category = Category::findOne($this->category_id);

        return ['url' => '/category/' . $category->url, 'label' => $category->header];
    }

    public function getUrl($is_full = false) {

        return ($is_full) ?
                Url::toRoute('/catalog/' . $this->url, true) :
                '/catalog/' . $this->url;
    }

}
