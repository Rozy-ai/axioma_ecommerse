<?php

namespace app\modules\content\models;

use Yii;

class Content extends \app\models\Content {

    static $_type_content = [
        1 => 'Страница',
        2 => 'Услуги',
        3 => 'Новости',
        4 => 'Статьи',
    ];

    public function beforeSave($insert) {

//        $this->

        return parent::beforeSave($insert);
    }

}
