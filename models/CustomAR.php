<?php

namespace app\models;

use Yii;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

class CustomAR extends \yii\db\ActiveRecord {

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

    // для списков
    public static function __getList() {

        return ArrayHelper::map(self::__getAll(), 'id', 'name');
    }

    public static function __getAll() {

        return self::find()->all();
    }

}
