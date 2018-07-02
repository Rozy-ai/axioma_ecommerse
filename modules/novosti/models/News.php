<?php

namespace app\modules\novosti\models;

use Yii;

class News extends \app\models\Core {

    const MODEL = 'NewsItem';

    static $_act = ['Нет', "Да"];

    public function beforeValidate() {

        $this->model = self::MODEL;

        return parent::beforeValidate();
    }

    public static function getLast() {

        $model = News::find()->where(['model' => self::MODEL])
                ->orderBy(['news_date' => SORT_DESC])
                ->limit(4)
                ->all();

        return $model;
    }

    public static function getLatestNew() {

        $model = News::find()->where(['model' => self::MODEL])->orderBy(['create_time' => SORT_DESC])->one();

        return $model ? $model : false;
    }

    public static function getAll() {

        $model = News::find()->where(['model' => self::MODEL, 'act' => 1])->orderBy(['create_time' => SORT_DESC])->all();

        return $model ? $model : false;
    }

}
