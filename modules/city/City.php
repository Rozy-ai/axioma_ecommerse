<?php

/*
 * Вытаскиваем город из подддомена
 *
 *
 */

namespace app\modules\city;

use Yii;

class City extends \yii\base\BaseObject {

    public $current_city = 'ekaterinburg';

    public function getId() {

        $arr = explode('.', $_SERVER['HTTP_HOST']);

        if (isset($arr[0]) && ($arr[0] != 'www')) {
            $this->current_city = $arr[0];
        }

        Yii::error($this->current_city);
        $id = \app\modules\city\models\City::getCityIdByName($this->current_city);

        return $id ? $id : 0;
    }

}
