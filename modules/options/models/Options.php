<?php

namespace app\modules\options\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property integer $id
 * @property string $name
 * @property string $label
 * @property string $text
 */
class Options extends \yii\db\ActiveRecord {

    const MASK = "/(\{\w+\})/";

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'label', 'text'], 'required'],
            [['text'], 'string'],
            [['name', 'label'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'label' => 'Label',
            'text' => 'Text',
        ];
    }

    public static function getVal($name) {

        return ($model = self::find()->where(['name' => $name])->one()) ?
                self::replaceShortCodes($model->text) : false;
    }

    public static function replaceShortCodes($text) {

        if (preg_match_all(self::MASK, $text, $short_vars)) {

            $short_vars = $short_vars[0];

            foreach ($short_vars as $var):

                $value = \app\modules\region_templates\models\RegionTemplates::findOne([
                            'name' => str_replace(['{', '}'], '', $var),
                            'city_id' => \Yii::$app->city->getId(),
                ]);

                if ($value)
                    $text = str_replace($var, $value->value, $text);

            endforeach;

//            print_r($short_vars);
        }

//        exit();

        return $text;
    }

}
