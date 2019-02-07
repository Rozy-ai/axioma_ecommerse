<?php

namespace app\modules\content\models;

use Yii;
use vova07\fileapi\behaviors\UploadBehavior;

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

//    public function behaviors() {
//        return [
//            'uploadBehavior' => [
//                'class' => UploadBehavior::className(),
//                'attributes' => [
//                    'image' => [
//                        'path' => '@webroot/image/content',
//                        'tempPath' => '@webroot/',
//                        'url' => '/image/content/'
//                    ],
//                ]
//            ]
//        ];
//    }

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

    public static function getArticles() {

        return self::findAll([
                    'type_id' => self::TYPE['Статьи'],
                    'is_enable' => 1,
        ]);
    }

    public function getImageService() {

        return '/image/content/' . $this->image;
    }

}
