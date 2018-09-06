<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "robots".
 *
 * @property int $id
 * @property int $city_id Город
 * @property string $content Содержание
 *
 * @property City $city
 */
class Robots extends \app\models\CustomAR
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'robots';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id'], 'required'],
            [['city_id'], 'integer'],
            [['content'], 'string'],
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
            'city_id' => 'Город',
            'content' => 'Содержание',
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
