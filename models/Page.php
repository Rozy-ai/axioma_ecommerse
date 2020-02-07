<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property int $city_id Родительская
 * @property int $parent_id Родительская
 * @property string $title
 * @property string $uri
 * @property string $content
 * @property int $ord
 * @property string $seo_title
 * @property string $seo_description
 * @property string $seo_keywords
 * @property int $is_enable
 * @property int $created_at
 *
 * @property City $city
 */
class Page extends \app\models\CustomAR
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id'], 'required'],
            [['city_id', 'parent_id', 'ord', 'is_enable', 'created_at'], 'integer'],
            [['content'], 'string'],
            [['title', 'seo_title', 'seo_description', 'seo_keywords'], 'string', 'max' => 500],
            [['uri'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'Родительская',
            'parent_id' => 'Родительская',
            'title' => 'Title',
            'uri' => 'Uri',
            'content' => 'Content',
            'ord' => 'Ord',
            'seo_title' => 'Seo Title',
            'seo_description' => 'Seo Description',
            'seo_keywords' => 'Seo Keywords',
            'is_enable' => 'Is Enable',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
