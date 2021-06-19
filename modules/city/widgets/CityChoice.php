<?php

namespace app\modules\city\widgets;

use Yii;
use yii\base;
use yii\helpers\Html;
use yii\base\Widget;
use app\modules\city\models\City;

class CityChoice extends Widget {

    public $mobile = false;
    private $current_city = '';
    private $default_city = 'www';

    public function init() {

        $host = $_SERVER['HTTP_HOST'];
        $this->current_city = ((count($arr = explode('.', $_SERVER['HTTP_HOST'])) == 3 && $arr[0] != 'www')) ? $arr[0] : $this->default_city;

        // Добавляем текущий город в сессию для других модулей
        Yii::$app->session->set('current_city', City::getCityNameByCode($this->current_city));
//        $this->current_city = $this->default_city;

        parent::init();
    }

    public function run() {

        $cityes = City::find()->where(['is_enable' => 1])->orderBy(['order' => SORT_DESC])->all();

        $links = [];
        $current = '';
        foreach ($cityes as $city):
            if ($city->name_eng == $this->current_city)
                $current = Html::tag('strong', '<i class="fas fa-map-marker-alt"></i> ' . $city->name, ['class' => 'active-city']);
            else
                $links [] = ['link' => ($city->name_eng == $this->default_city) ?
                    Html::a($city->name, 'https://www.' . Yii::$app->params['defaultDomain'] . '/' . Yii::$app->request->pathInfo) :
                    Html::a($city->name, 'https://' . $city->name_eng . '.' . Yii::$app->params['baseDomain'] . '/' . Yii::$app->request->pathInfo)];
        endforeach;

        if ($this->mobile)
            return $this->render('city_choice_mobile', [
                        'links' => $links,
                        'current' => $current,
                            ]
            );
        else
            return $this->render('city_choice', [
                        'links' => $links,
                        'current' => $current,
                            ]
            );
    }

}
