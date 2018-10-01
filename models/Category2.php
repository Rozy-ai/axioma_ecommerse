<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category2".
 *
 * @property int $id
 * @property string $header Заголовок
 * @property string $url Url
 * @property string $preview Превью
 * @property string $content Содержание
 * @property string $image Изображение
 * @property string $ico Иконка
 * @property int $ord Порядок
 * @property string $title SEO Title
 * @property string $description SEO Description
 * @property string $keywords SEO Keyword
 * @property int $created_at Создано
 * @property int $is_enable Включено
 * @property int $parent_id
 *
 * @property Category2 $parent
 * @property Category2[] $category2s
 * @property Product[] $products
 */
class Category2 extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preview', 'content'], 'string'],
            [['ord', 'created_at', 'is_enable', 'parent_id'], 'integer'],
            [['parent_id'], 'required'],
            [['header', 'url', 'image', 'ico'], 'string', 'max' => 255],
            [['title', 'description', 'keywords'], 'string', 'max' => 500],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category2::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header' => 'Заголовок',
            'url' => 'Url',
            'preview' => 'Превью',
            'content' => 'Содержание',
            'image' => 'Изображение',
            'ico' => 'Иконка',
            'ord' => 'Порядок',
            'title' => 'SEO Title',
            'description' => 'SEO Description',
            'keywords' => 'SEO Keyword',
            'created_at' => 'Создано',
            'is_enable' => 'Включено',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category2::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory2s()
    {
        return $this->hasMany(Category2::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}
