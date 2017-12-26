<?php

namespace app\models;

use Yii;

class Info extends TblBlocks {

    public static function get($id) {

        return ($model = self::findOne($id)) ? $model->value : false;
    }

}
