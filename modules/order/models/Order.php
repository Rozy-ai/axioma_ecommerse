<?php

namespace app\modules\order\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $client_name
 * @property string $email
 * @property string $phone
 * @property integer $created_at
 */
class Order extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['created_at'], 'required'],
            [['created_at'], 'integer'],
            [['client_name', 'email', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'client_name' => 'Client Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'created_at' => 'Created At',
        ];
    }

    public function getItems() {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

}
