<?php

namespace app\modules\page\models;

use Yii;

class Page extends \app\models\Core {

    public static function getByUrl($url) {

        return ($model = self::find()->where(
                        'BINARY [[url]]=:url', ['url' => $url]
                )->
                andWhere(['act' => 1])
                ->one()) ? $model : false;
    }

}
