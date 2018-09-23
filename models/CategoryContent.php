<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_content".
 *
 * @property int $id
 * @property int $city_id Город
 * @property int $category_id
 * @property string $preview Анонс
 * @property string $content Содержание
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 *
 * @property Category $category
 * @property City $city
 */
class CategoryContent extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'category_id'], 'required'],
            [['city_id', 'category_id'], 'integer'],
            [['preview', 'content'], 'string'],
            [['seo_title', 'seo_description', 'seo_keywords'], 'string', 'max' => 500],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'Город',
            'category_id' => 'Category ID',
            'preview' => 'Анонс',
            'content' => 'Содержание',
            'seo_title' => 'Seo Title',
            'seo_description' => 'Seo Description',
            'seo_keywords' => 'Seo Keywords',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
