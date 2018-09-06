<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property int $id
 * @property string $name
 * @property string $label
 * @property string $text
 * @property int $ord
 */
class Options extends \app\models\CustomAR
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'label', 'text', 'ord'], 'required'],
            [['text'], 'string'],
            [['ord'], 'integer'],
            [['name', 'label'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'label' => 'Label',
            'text' => 'Text',
            'ord' => 'Ord',
        ];
    }
}
