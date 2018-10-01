<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portfolio_image".
 *
 * @property int $id
 * @property int $portfolio_id
 * @property string $image
 * @property int $order
 * @property int $created_at
 * @property int $is_main Основное изображение
 *
 * @property Portfolio $portfolio
 */
class PortfolioImage extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'portfolio_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['portfolio_id', 'order', 'created_at', 'is_main'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['portfolio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Portfolio::className(), 'targetAttribute' => ['portfolio_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'portfolio_id' => 'Portfolio ID',
            'image' => 'Image',
            'order' => 'Order',
            'created_at' => 'Created At',
            'is_main' => 'Основное изображение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolio()
    {
        return $this->hasOne(Portfolio::className(), ['id' => 'portfolio_id']);
    }
}
