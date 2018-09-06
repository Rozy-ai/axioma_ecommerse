<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region_options".
 *
 * @property int $id
 * @property int $id_city
 * @property string $name
 * @property string $label
 * @property string $text
 * @property int $ord
 *
 * @property City $city
 */
class RegionOptions extends \app\models\CustomAR
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_city', 'ord'], 'integer'],
            [['name', 'label', 'text', 'ord'], 'required'],
            [['text'], 'string'],
            [['name', 'label'], 'string', 'max' => 255],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['id_city' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_city' => 'Id City',
            'name' => 'Name',
            'label' => 'Label',
            'text' => 'Text',
            'ord' => 'Ord',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'id_city']);
    }
}
