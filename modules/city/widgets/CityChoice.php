<?php

namespace app\modules\city\widgets;

use Yii;
use yii\base;
use yii\helpers\Html;
use yii\base\Widget;
use app\modules\city\models\City;

class CityChoice extends Widget {

    private $current_city = '';
    private $default_city = 'ekaterinburg';

    public function init() {

        $host = $_SERVER['HTTP_HOST'];
        $this->current_city = ((count($arr = explode('.', $_SERVER['HTTP_HOST'])) == 3 && $arr[0] != 'www')) ? $arr[0] : $this->default_city;

        // Добавляем текущий город в сессию для других модулей
        Yii::$app->session->set('current_city', City::getCityNameByCode($this->current_city));
//        $this->current_city = $this->default_city;

        parent::init();
    }

    public function run() {

        $cityes = City::find()->where(['is_enable' => 1])->orderBy(['name' => SORT_DESC])->all();

        $links = [];
        foreach ($cityes as $city):
            if ($city->name_eng == $this->current_city)
                $links[] = Html::tag('strong', '<i class="fas fa-map-marker-alt"></i> ' . $city->name, ['class' => 'active-city']);
            else
                $links [] = ($city->name_eng == $this->default_city) ?
                        Html::a($city->name, 'https://www.' . Yii::$app->params['defaultDomain'] . '/' . Yii::$app->request->pathInfo) :
                        Html::a($city->name, 'https://' . $city->name_eng . '.' . Yii::$app->params['baseDomain'] . '/' . Yii::$app->request->pathInfo);
        endforeach;

        return $this->render('city_choice', [
                    'links' => $links,
                    'current_city' => City::getCityNameByCode($this->current_city),
                        ]
        );
    }

}
