<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_blocks".
 *
 * @property integer $id
 * @property string $model
 * @property string $label
 * @property string $name
 * @property string $value
 * @property string $create_time
 * @property string $update_time
 */
class TblBlocks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_blocks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model', 'label', 'name'], 'required'],
            [['value'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['model', 'label', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'label' => 'Label',
            'name' => 'Name',
            'value' => 'Value',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
