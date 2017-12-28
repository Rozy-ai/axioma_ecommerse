<?php

namespace app\modules\region_templates\models;

use Yii;

/**
 * This is the model class for table "region_templates".
 *
 * @property integer $id
 * @property integer $city_id
 * @property string $name
 * @property string $value
 */
class RegionTemplates extends \app\models\RegionTemplates {

    const LABEL = 'in_header';

    public static function getInHeader() {

        $value = \app\modules\region_templates\models\RegionTemplates::findOne([
                    'name' => self::LABEL,
                    'city_id' => \Yii::$app->city->getId(),
        ]);

        return (isset($value->value) && $value->value) ? $value->value : false;
    }

}
