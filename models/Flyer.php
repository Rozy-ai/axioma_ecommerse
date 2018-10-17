<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flyer".
 *
 * @property int $id
 * @property string $name Имя
 * @property int $created_at Создано
 *
 * @property FlyerGoods[] $flyerGoods
 */
class Flyer extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flyer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'created_at' => 'Создано',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlyerGoods()
    {
        return $this->hasMany(FlyerGoods::className(), ['flyer_id' => 'id']);
    }
}
