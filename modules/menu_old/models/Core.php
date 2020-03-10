<?php

namespace app\modules\menu\models;

use Yii;

class Core extends \app\models\Core {

    public static function getUrl($id) {
        return ($model = self::findOne($id)) ? $model->url : '/';
    }

}
