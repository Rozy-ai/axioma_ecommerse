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

        if (count($arr) == 4) {
            $this->current_city = $arr[1];
        }

        Yii::error($this->current_city);
        $id = \app\modules\city\models\City::getCityIdByName($this->current_city);

        return $id ? $id : 0;
    }

}
