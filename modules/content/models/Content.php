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

    const TYPE = [
        'Страницы' => 1,
        'Услуги' => 2,
        'Новости' => 3,
        'Статьи' => 4,
    ];

    public function beforeSave($insert) {

        if ($this->type_id == 2 // Услуги
                && $this->is_main == 1) {

            self::updateAll(['is_main' => 0], ['type_id' => 2]);
        }

//        $this->

        return parent::beforeSave($insert);
    }

    public static function getServices() {

        return self::findAll([
                    'type_id' => self::TYPE['Услуги'],
                    'is_enable' => 1,
        ]);
    }

}
