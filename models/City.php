<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property int $cid
 * @property int $rid
 * @property string $name Город
 * @property string $name_eng Uri
 * @property string $latitude Широта
 * @property string $longitude Долгота
 * @property int $is_enable Включен
 * @property int $is_default
 *
 * @property RegionOptions[] $regionOptions
 * @property RegionTemplates[] $regionTemplates
 * @property Robots[] $robots
 */
class City extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cid', 'rid', 'is_enable', 'is_default'], 'integer'],
            [['name', 'name_eng', 'latitude', 'longitude'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
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
    public function getRegionOptions()
    {
        return $this->hasMany(RegionOptions::className(), ['id_city' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegionTemplates()
    {
        return $this->hasMany(RegionTemplates::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRobots()
    {
        return $this->hasMany(Robots::className(), ['city_id' => 'id']);
    }
}
