<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $client_name Имя Клиента
 * @property string $email
 * @property string $phone Телефон
 * @property int $created_at Создано
 */
class Order extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'required'],
            [['created_at'], 'integer'],
            [['client_name', 'email', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_name' => 'Имя Клиента',
            'email' => 'Email',
            'phone' => 'Телефон',
            'created_at' => 'Создано',
        ];
    }
}
