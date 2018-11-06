<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id Категория
 * @property string $article Артикул
 * @property string $header Заголовок
 * @property string $video_link Ссылка на видео
 * @property double $price Цена
 * @property string $url
 * @property string $content_info Информация
 * @property string $content_description Описание
 * @property string $content_characteristics Характеристики
 * @property string $content_install Варианты установок
 * @property int $ord Порядок
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property int $is_enable Включено
 * @property int $created_at
 * @property int $updated_at
 * @property int $product_type Расходник
 *
 * @property FlyerGoods[] $flyerGoods
 * @property Category2 $category
 * @property ProductImage[] $productImages
 * @property SupportedGoods[] $supportedGoods
 * @property SupportedGoods[] $supportedGoods0
 */
class Product extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'article', 'url'], 'required'],
            [['category_id', 'ord', 'is_enable', 'created_at', 'updated_at', 'product_type'], 'integer'],
            [['price'], 'number'],
            [['content_info', 'content_description', 'content_characteristics', 'content_install'], 'string'],
            [['article', 'url'], 'string', 'max' => 255],
            [['header', 'video_link', 'title', 'description', 'keywords'], 'string', 'max' => 500],
            [['url'], 'unique'],
            [['article'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category2::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'article' => 'Артикул',
            'header' => 'Заголовок',
            'video_link' => 'Ссылка на видео',
            'price' => 'Цена',
            'url' => 'Url',
            'content_info' => 'Информация',
            'content_description' => 'Описание',
            'content_characteristics' => 'Характеристики',
            'content_install' => 'Варианты установок',
            'ord' => 'Порядок',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'is_enable' => 'Включено',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'product_type' => 'Расходник',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlyerGoods()
    {
        return $this->hasMany(FlyerGoods::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category2::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportedGoods()
    {
        return $this->hasMany(SupportedGoods::className(), ['parent_product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportedGoods0()
    {
        return $this->hasMany(SupportedGoods::className(), ['child_product_id' => 'id']);
    }
}
