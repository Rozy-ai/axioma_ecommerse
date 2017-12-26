<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_slider".
 *
 * @property integer $id
 * @property string $model
 * @property string $name
 * @property string $image
 * @property string $content
 * @property string $link
 * @property integer $act
 * @property integer $ord
 * @property string $create_time
 * @property string $update_time
 */
class Slider extends UploadFile {

    static $_act = ['Нет', 'Да'];

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_slider';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'image', 'content', 'link', 'act', 'ord', 'create_time', 'update_time'], 'required'],
            [['content'], 'string'],
            [['act', 'ord'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['name', 'image', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'image' => 'Изображение',
            'content' => 'Содержание',
            'link' => 'Ссылка',
            'act' => 'Показывать',
            'ord' => 'Порядок',
            'Создано' => 'Create Time',
            'Обновлено' => 'Update Time',
        ];
    }

}
