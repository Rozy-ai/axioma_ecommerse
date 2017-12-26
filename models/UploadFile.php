<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadFile extends \yii\db\ActiveRecord {

    public $img_file;

    public function rules() {
        return [
            [['img_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png, jpeg'],
        ];
    }

    public function upload() {

        $dirname = \Yii::getAlias('@upload');

        if (!file_exists($dirname)) {
            mkdir($dirname, 0775, true);
        }

        $this->img_file = UploadedFile::getInstance($this, 'img_file');

        if (!$this->img_file)
            return $this->image;

        $filename = $dirname . '/' . $this->img_file->baseName . '.' . $this->img_file->extension;

        return ($file = $this->img_file->saveAs($filename)) ? '/image/upload/' . $this->img_file->baseName . '.' . $this->img_file->extension : '';
    }

    public function beforeValidate() {

//        if ($_FILES)
            $this->image = $this->upload();

        return parent::beforeValidate();
    }

    public function beforeSave($insert) {


        return parent::beforeSave($insert);
    }

}
