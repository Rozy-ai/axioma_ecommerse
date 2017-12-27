<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of YesNo
 *
 * @author smol
 */
class YesNo {

    const ARR = ['Нет', 'Да'];

    public function get($id) {

        return $id == 1 ? 'Да' : 'Нет';
    }

    public function getList() {
        return self::ARR;
    }

}
