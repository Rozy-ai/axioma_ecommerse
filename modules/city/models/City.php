<?php

namespace app\modules\city\models;

use Yii;
use yii\helpers\ArrayHelper;

class City extends \app\models\City {

    public static function getActiveCity() {

        return ArrayHelper::map(City::findAll(['is_enable' => 1]), 'id', 'name');
    }

    public static function getCityIdByName($name) {

        return (self::findOne(['name_eng' => $name])) ? self::findOne(['name_eng' => $name])->id : false;
    }

    public static function getCityNameById($id) {

        return (self::findOne($id)) ? self::findOne($id)->name : false;
    }

    public static function getCityNameByCode($code) {

        return (self::findOne(['name_eng' => $code])) ? self::findOne(['name_eng' => $code])->name : false;
    }

    public function beforeSave($insert) {

        if ($this->is_default == 1 && self::findOne(['is_default' => 1]))
            $this->addError('is_default', 'Уже выбран главный регион');
        else
            return parent::beforeSave($insert);
    }

}
