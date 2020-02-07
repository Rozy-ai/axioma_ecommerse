<?php

namespace app\modules\products\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ImportCSV extends Model {

    public $file;

    public function rules() {
        return [
            [['file'], 'file'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'file' => 'Выгрузить файл',
        ];
    }

}
