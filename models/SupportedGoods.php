<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supported_goods".
 *
 * @property int $id
 * @property int $parent_product_id
 * @property int $child_product_id
 *
 * @property Product $parentProduct
 * @property Product $childProduct
 */
class SupportedGoods extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supported_goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_product_id', 'child_product_id'], 'required'],
            [['parent_product_id', 'child_product_id'], 'integer'],
            [['parent_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['parent_product_id' => 'id']],
            [['child_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['child_product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_product_id' => 'Parent Product ID',
            'child_product_id' => 'Child Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'parent_product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'child_product_id']);
    }
}
