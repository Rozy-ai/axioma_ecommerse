<?php

namespace app\modules\seo_template\models;

use Yii;

/**
 * This is the model class for table "seo_template".
 *
 * @property int $id
 * @property string $title Шаблон заголовка
 * @property string $description Шаблон описания
 * @property int $for_id Сущность
 */
class SeoTemplate extends \app\models\SeoTemplate {

    const PRODUCTS = 10;
    const CATEGORIES = 20;
    const FOR = [
        10 => 'Товары',
        20 => 'Категории',
    ];

}
