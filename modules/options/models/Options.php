<?php

namespace app\modules\options\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property integer $id
 * @property string $name
 * @property string $label
 * @property string $text
 */
class Options extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'label', 'text'], 'required'],
            [['text'], 'string'],
            [['name', 'label'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'label' => 'Label',
            'text' => 'Text',
        ];
    }

    public static function getVal($name) {

        return ($model = self::find()->where(['name' => $name])->one()) ?
                $model->text : false;
    }

}
