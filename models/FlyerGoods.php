<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flyer_goods".
 *
 * @property int $id
 * @property int $flyer_id Буклет
 * @property int $product_id Продукт
 * @property double $price Цена
 * @property double $price_new Новая цена
 * @property int $order Порядок
 * @property string $custom_text Новое описание
 * @property string $name Наименование
 * @property string $image Изображение
 *
 * @property Flyer $flyer
 * @property Product $product
 */
class FlyerGoods extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flyer_goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['flyer_id', 'product_id', 'order'], 'integer'],
            [['price', 'price_new'], 'number'],
            [['custom_text'], 'string'],
            [['name', 'image'], 'string', 'max' => 255],
            [['flyer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flyer::className(), 'targetAttribute' => ['flyer_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flyer_id' => 'Буклет',
            'product_id' => 'Продукт',
            'price' => 'Цена',
            'price_new' => 'Новая цена',
            'order' => 'Порядок',
            'custom_text' => 'Новое описание',
            'name' => 'Наименование',
            'image' => 'Изображение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlyer()
    {
        return $this->hasOne(Flyer::className(), ['id' => 'flyer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
