<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id Категория
 * @property int $fastcat_id Быстрая категория
 * @property string $cats Дополнительные категории
 * @property string $article Артикул
 * @property string $header Заголовок
 * @property string $video_link Ссылка на видео
 * @property double $price Цена
 * @property string $url
 * @property string $content_info Информация
 * @property string $content_description Описание
 * @property string $content_characteristics Характеристики
 * @property string $content_install Варианты установок
 * @property int $ord Порядок обратный
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property int $is_enable Включено
 * @property int $created_at
 * @property int $updated_at
 * @property int $product_type Расходник
 * @property int $show_in_recomended Показывать в рекомендуемых
 * @property int $recomended_sort Сортировка рекомендуемых(обратная)
 * @property int $in_stock На складе
 * @property int $krat Кратность для заказа
 * @property int $is_akustika Акустомагнитные
 * @property int $is_radio Радио
 * @property int $is_ip IP
 * @property int $is_tvi HD-TVI
 * @property int $enter_width Ширина прохода
 *
 * @property Category $category
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
            [['category_id', 'fastcat_id', 'article', 'url'], 'required'],
            [['category_id', 'fastcat_id', 'ord', 'is_enable', 'created_at', 'updated_at', 'product_type', 'show_in_recomended', 'recomended_sort', 'in_stock', 'krat', 'is_akustika', 'is_radio', 'is_ip', 'is_tvi', 'enter_width'], 'integer'],
            [['price'], 'number'],
            [['content_info', 'content_description', 'content_characteristics', 'content_install'], 'string'],
            [['cats', 'article', 'url'], 'string', 'max' => 255],
            [['header', 'video_link', 'title', 'description', 'keywords'], 'string', 'max' => 500],
            [['url'], 'unique'],
            [['article'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'fastcat_id' => 'Быстрая категория',
            'cats' => 'Дополнительные категории',
            'article' => 'Артикул',
            'header' => 'Заголовок',
            'video_link' => 'Ссылка на видео',
            'price' => 'Цена',
            'url' => 'Url',
            'content_info' => 'Информация',
            'content_description' => 'Описание',
            'content_characteristics' => 'Характеристики',
            'content_install' => 'Варианты установок',
            'ord' => 'Порядок обратный',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'is_enable' => 'Включено',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'product_type' => 'Расходник',
            'show_in_recomended' => 'Показывать в рекомендуемых',
            'recomended_sort' => 'Сортировка рекомендуемых(обратная)',
            'in_stock' => 'На складе',
            'krat' => 'Кратность для заказа',
            'is_akustika' => 'Акустомагнитные',
            'is_radio' => 'Радио',
            'is_ip' => 'IP',
            'is_tvi' => 'HD-TVI',
            'enter_width' => 'Ширина прохода',
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
