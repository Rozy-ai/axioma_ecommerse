<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadFile extends \yii\db\ActiveRecord {

    const MASK = "/\{[a-z0-9-]+}/";

    public $image_portfolio;
    public $upload_file;
    public $image;

    /*
     * Шаблон модели контента. С загрузкой изображений.
     */

    public function replaceCodes() {

        /*
         * Ищем вхождения шаблонов
         */

        if (($this->hasAttribute('h1')))
            $this->h1 = $this->replaceShortCodes($this->h1);

        if (($this->hasAttribute('anons')))
            $this->anons = $this->replaceShortCodes($this->anons);

        if (($this->hasAttribute('preview')))
            $this->preview = $this->replaceShortCodes($this->preview);

        if (($this->hasAttribute('content')))
            $this->content = $this->replaceShortCodes($this->content);

        if (($this->hasAttribute('content2')))
            $this->content2 = $this->replaceShortCodes($this->content2);

        if (($this->hasAttribute('title')))
            $this->title = $this->replaceShortCodes($this->title);

        if (($this->hasAttribute('keyword')))
            $this->keyword = $this->replaceShortCodes($this->keyword);

        if (($this->hasAttribute('description')))
            $this->description = $this->replaceShortCodes($this->description);

        if (($this->hasAttribute('seo_title')))
            $this->seo_title = $this->replaceShortCodes($this->seo_title);

        if (($this->hasAttribute('seo_keyword')))
            $this->seo_keyword = $this->replaceShortCodes($this->seo_keyword);

        if (($this->hasAttribute('seo_description')))
            $this->seo_description = $this->replaceShortCodes($this->seo_description);
    }

    private function replaceShortCodes($text) {

        if (preg_match_all(self::MASK, $text, $short_vars)) {

            $short_vars = $short_vars[0];

            foreach ($short_vars as $var):

                $value = \app\modules\region_templates\models\RegionTemplates::findOne([
                            'name' => str_replace(['{', '}'], '', $var),
                            'city_id' => \Yii::$app->city->getId(),
                ]);

                if ($value)
                    $text = str_replace($var, $value->value, $text);

            endforeach;

//            print_r($short_vars);
        }

//        exit();

        return $text;
    }

    public $img_file;

    public function rules() {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg'],
            [['img_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png, jpeg'],
            [['image_portfolio'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg'],
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
