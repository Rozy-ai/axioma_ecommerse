<?php

namespace app\modules\vacancy\models;

use Yii;
use app\modules\city\models\City;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $name Название должности
 * @property string $description Требования
 * @property string $pay З/П
 * @property int $city_id Город
 * @property int $is_close Вакансия закрыта
 */
class Vacancy extends \app\models\Vacancy {

    public function getCity() {

        return City::findOne($this->city_id);
    }

}
