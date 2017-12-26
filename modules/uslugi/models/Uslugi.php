<?php

namespace app\modules\uslugi\models;

use Yii;

class Uslugi extends \app\models\Core {

    const PARENT_ID = 4369;

    public static function getAll() {

        $model = self::find()->where(['parent_id' => self::PARENT_ID, 'act' => 1])->orderBy(['create_time' => SORT_DESC])->all();

        return $model ? $model : false;
    }

}
