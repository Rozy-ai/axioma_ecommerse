<?php

namespace app\modules\shortcode\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "shortcode".
 *
 * @property int $id
 * @property string $name Имя
 * @property string $description Описание
 */
class Shortcode extends \app\models\Shortcode {

    public static function getList() {

        return ArrayHelper::map(self::find()->all(), 'name', 'name');
    }

}
