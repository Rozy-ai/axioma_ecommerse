<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_slider".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $content
 * @property string $link
 * @property int $act
 * @property int $ord
 * @property string $create_time
 * @property string $update_time
 */
class TblSlider extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'content', 'link', 'act', 'ord', 'create_time', 'update_time'], 'required'],
            [['content'], 'string'],
            [['act', 'ord'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['name', 'image', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'content' => 'Content',
            'link' => 'Link',
            'act' => 'Act',
            'ord' => 'Ord',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
