<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class MarkirovkaOrder extends EmailForm {

    public $name;
    public $phone;
    public $inn;
    public $email;
    public $subject = 'Консультация по маркировке';

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'phone', 'inn', 'email'], 'required'],
            [['email'], 'email'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Телефон',
            'inn' => 'ИНН',
            'email' => 'E-mail',
        ];
    }

}
