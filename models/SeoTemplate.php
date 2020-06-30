<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seo_template".
 *
 * @property int $id
 * @property string $title Шаблон заголовка
 * @property string $description Шаблон описания
 * @property int $for_id Сущность
 */
class SeoTemplate extends \app\models\CustomAR
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seo_template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['for_id'], 'integer'],
            [['title', 'description'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Шаблон заголовка',
            'description' => 'Шаблон описания',
            'for_id' => 'Сущность',
        ];
    }
}
