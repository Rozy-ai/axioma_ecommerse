<?php

namespace app\modules\client\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property integer $id
 * @property string $name
 * @property string $file_name
 * @property integer $ord
 */
class Client extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ord'], 'integer'],
            [['name', 'file_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'file_name' => 'Файл',
            'ord' => 'Ord',
        ];
    }

}
