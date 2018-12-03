<?php

namespace app\modules\info\models;

use Yii;

class Info extends \app\models\InfoBlock {

    public static function get($sys_name) {

        return ($model = self::findOne(['name' => $sys_name])) ?
                trim($model->value) : '';
    }

}
