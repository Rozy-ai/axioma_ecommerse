<?php

namespace app\modules\stati\models;

use Yii;

class Stati extends \app\models\Core {

    const PARENT_ID = 771;

    static $_act = ["Нет", "Да"];

    public static function getAll() {

        $model = self::find()->where(['parent_id' => self::PARENT_ID, 'act' => 1])->orderBy(['create_time' => SORT_DESC])->all();

        return $model ? $model : false;
    }

    public function beforeSave($insert) {

        $this->parent_id = self::PARENT_ID;
        return parent::beforeSave($insert);
    }

}
