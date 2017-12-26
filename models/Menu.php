<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_menu".
 *
 * @property integer $id
 * @property string $model
 * @property integer $parent_id
 * @property integer $core_id
 * @property integer $find_id
 * @property string $name
 * @property string $title
 * @property string $url
 * @property integer $act
 * @property integer $ord
 * @property string $menu_type
 * @property string $create_time
 * @property string $update_time
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model', 'parent_id', 'name'], 'required'],
            [['parent_id', 'core_id', 'find_id', 'act', 'ord'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['model', 'name', 'title', 'url'], 'string', 'max' => 255],
            [['menu_type'], 'string', 'max' => 50],
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
            'parent_id' => 'Parent ID',
            'core_id' => 'Core ID',
            'find_id' => 'Find ID',
            'name' => 'Name',
            'title' => 'Title',
            'url' => 'Url',
            'act' => 'Act',
            'ord' => 'Ord',
            'menu_type' => 'Menu Type',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
