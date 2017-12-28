<?php

/*
 * Вытаскиваем город из подддомена
 * 
 * 
 */

namespace app\modules\city;

class City {

    private $current_city = '';
    private $default_city = 'ekaterinburg';

    private function init() {
        $host = $_SERVER['HTTP_HOST'];
//        $this->current_city = ( count($arr = explode('.', $_SERVER['HTTP_HOST'])) == 3) ? $arr[0] : $this->default_city;
        $this->current_city = $this->default_city;
    }

    public function get() {

        $this->init();

        return $this->current_city;
    }

    public function getId() {

        $this->init();

        $id = \app\modules\city\models\City::getCityIdByName($this->current_city);

        return $id ? $id : 0;
    }

}
