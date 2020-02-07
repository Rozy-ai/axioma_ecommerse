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
 * @property double $price_nds Цена с НДС
 * @property double $price_nds_new Цена с НДС новая
 *
 * @property Flyer $flyer
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
            [['price', 'price_new', 'price_nds', 'price_nds_new'], 'number'],
            [['custom_text'], 'string'],
            [['name', 'image'], 'string', 'max' => 255],
            [['flyer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flyer::className(), 'targetAttribute' => ['flyer_id' => 'id']],
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
            'price_nds' => 'Цена с НДС',
            'price_nds_new' => 'Цена с НДС новая',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlyer()
    {
        return $this->hasOne(Flyer::className(), ['id' => 'flyer_id']);
    }
}
