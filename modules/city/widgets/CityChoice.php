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
        $this->current_city = ( (count($arr = explode('.', $_SERVER['HTTP_HOST'])) == 3 && $arr[0] != 'www')) ? $arr[0] : $this->default_city;

        parent::init();
    }

    public function run() {

        $cityes = City::find()->where(['is_enable' => 1])->orderBy(['name' => SORT_DESC])->all();

        $links = '';
        foreach ($cityes as $city):
            if ($city->name_eng == $this->current_city)
                $links .= Html::tag('strong', $city->name);
            else
                $links .= ($city->name_eng == $this->default_city) ?
                        Html::a($city->name, 'http://' . Yii::$app->params['defaultDomain']) :
                        Html::a($city->name, 'http://' . $city->name_eng . '.' . Yii::$app->params['baseDomain']) . '<br/>';
        endforeach;

        $links = Html::tag('div', $links, ['class' => 'city-links']);

        return $this->render('city_choice', [
                    'links' => $links,
                    'current_city' => City::getCityNameByCode($this->current_city),
                        ]
        );
    }

}
