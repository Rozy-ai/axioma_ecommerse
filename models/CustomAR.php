<?php

namespace app\models;

use Yii;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;

class CustomAR extends \yii\db\ActiveRecord {

    const MASK = "/\{[a-z0-9-]+}/";

    public function beforeSave($insert) {

        /*
         * Дата создания
         */

        if ($this->hasAttribute('created_at')) {
//            var_dump($this);
            if ($this->isNewRecord)
                $this->created_at = time();
        }

        /*
         * Дата обновления
         */

        if ($this->hasAttribute('updated_at')) {

            $this->updated_at = time();
        }


        return parent::beforeSave($insert);
    }

    public function afterFind() {

//        echo Yii::$app->controller->module->module->layout;
//        var_dump(Yii::$app->controller);
//        exit();

        if (Yii::$app->controller->layout != '@layouts/admin' && !is_a(Yii::$app, 'yii\console\Application')) {


//            if ($this->hasAttribute('content')) {
//
//
//                $this->content = preg_replace('/<img src="([^"]+)" alt="([^"]+)"  style="([^"]+)"[^>]+>/i'
//                        , Html::a(Html::img('$1', ['alt' => '$2', 'style' => '$3']), '$1'
//                                , ['class' => 'popup-link']), $this->content);
//
////                $this->content = '';
//            }

            /*
             * перебираем шорткоды
             */


            $attrS = ['header', 'content', 'title', 'description', 'keyword'];

            foreach ($attrS as $attr)
                if (($this->hasAttribute($attr)))
                    $this->$attr = $this->replaceShortCodes($this->$attr);
        }

//        echo $this->layout;
//        if($this->la)

        return parent::afterFind();
    }

    // для списков
    public static function __getList() {

        return ArrayHelper::map(self::__getAll(), 'id', 'name');
    }

    // для списков
    public static function __getHeaders() {

        return ArrayHelper::map(self::__getAll(), 'id', 'header');
    }

    public static function __getAll() {

        return self::find()->all();
    }

    public function setWaterMark($_image, $size = 1400) {

        $_image_tmp = $_image;

        $_image = str_replace('//', '/', Yii::getAlias('@webroot') . $_image);

        $watermarkImage = Yii::getAlias('@webroot') . '/image/watermark_8.png';
//        $watermarkImage = Yii::getAlias('@webroot') . '/image/watermark_30.png';

        $image_ready = Yii::getAlias('@webroot') . '/image/ready/' . basename($_image);

        if (!file_exists($image_ready)) {
            if (!$_image_tmp || !file_exists($_image)) {
                $_image = Yii::getAlias('@webroot') . '/image/no_img.jpg';
                $new_image = Image::watermark($_image, $_image);
            } else {

                $sizes = getimagesize($_image);
//            Yii::error($sizes);
                $wm = Image::thumbnail($watermarkImage, $sizes[0], $size[1]);

                $watermarkImage = Yii::getAlias('@webroot') . '/image/watermark_' . $sizes[0] . '.png';
                $wm->save($watermarkImage);

                $new_image = Image::watermark($_image, $watermarkImage);
            }
//        $new_image = $new_image->resize($new_image->get('png'), $size);
            $new_image = Image::thumbnail($new_image, $size, $size);
            $new_image->save($image_ready, ['quality' => 80]);
        }

        return '/image/ready/' . basename($_image);
    }

    public function replaceShortCodes($text) {

        if (preg_match_all(self::MASK, $text, $short_vars)) {

            $short_vars = $short_vars[0];

            foreach ($short_vars as $var):

                $_var = str_replace(['{', '}'], '', $var);

                if ($var == '{price}') {

                    if ($this->hasAttribute('price'))
                        $text = str_replace($var, $this->price . ' руб.', $text);
                } else {


                    if ($this->hasAttribute($_var))
                        $text = str_replace($var, $this->$_var, $text);
                }


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

}
