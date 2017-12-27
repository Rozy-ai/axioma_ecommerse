<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property integer $cid
 * @property integer $rid
 * @property string $name
 * @property string $name_eng
 * @property string $latitude
 * @property string $longitude
 * @property integer $is_enable
 * @property integer $is_default
 *
 * @property CategoryContent[] $categoryContents
 * @property RegionTemplates[] $regionTemplates
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'rid', 'is_enable', 'is_default'], 'integer'],
            [['name', 'name_eng', 'latitude', 'longitude'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'Cid',
            'rid' => 'Rid',
            'name' => 'Город',
            'name_eng' => 'Uri',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            'is_enable' => 'Включен',
            'is_default' => 'Is Default',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryContents()
    {
        return $this->hasMany(CategoryContent::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegionTemplates()
    {
        return $this->hasMany(RegionTemplates::className(), ['city_id' => 'id']);
    }
}
