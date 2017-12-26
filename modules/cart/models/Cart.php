<?php

namespace app\modules\cart\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property string $session
 * @property integer $product_id
 * @property integer $count
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['session', 'product_id', 'count'], 'required'],
            [['product_id', 'count'], 'integer'],
            [['session'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'session' => 'Session',
            'product_id' => 'Product ID',
            'count' => 'Count',
        ];
    }
}
