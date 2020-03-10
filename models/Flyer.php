<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flyer".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $image
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
            [['name', 'image'], 'required'],
            [['created_at'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
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
            'image' => 'Image',
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
