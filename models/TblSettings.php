<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_settings".
 *
 * @property int $id
 * @property string $category
 * @property string $key
 * @property string $value
 * @property string $label
 * @property string $comment
 */
class TblSettings extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'value', 'label'], 'required'],
            [['value'], 'string'],
            [['category'], 'string', 'max' => 64],
            [['key', 'label', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'key' => 'Key',
            'value' => 'Value',
            'label' => 'Label',
            'comment' => 'Comment',
        ];
    }
}
