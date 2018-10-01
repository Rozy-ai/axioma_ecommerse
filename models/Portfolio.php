<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portfolio".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $anons Анонс
 * @property string $text Описание
 * @property string $title SEO Title
 * @property string $description SEO Description
 * @property string $keywords SEO Keywords
 * @property int $order Порядок
 *
 * @property PortfolioImage[] $portfolioImages
 */
class Portfolio extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'portfolio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['anons', 'text'], 'string'],
            [['order'], 'integer'],
            [['name', 'title', 'description', 'keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'anons' => 'Анонс',
            'text' => 'Описание',
            'title' => 'SEO Title',
            'description' => 'SEO Description',
            'keywords' => 'SEO Keywords',
            'order' => 'Порядок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolioImages()
    {
        return $this->hasMany(PortfolioImage::className(), ['portfolio_id' => 'id']);
    }
}
