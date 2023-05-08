<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CallBackForm extends EmailForm {

    public $name;
    public $phone;
    public $personal_accept;
    public $email = '';
    public $subject = 'Запрос на звонок';

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'phone', 'personal_accept'], 'required'],
//            ['email', 'email'],
            ['personal_accept', 'in', 'range' => [1], 'message' => 'Вы должны дать согласие на обработку персональных данных.'],
            ['captcha', 'required'],
            ['captcha', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Телефон',
            'personal_accept' => 'Я даю согласие на обработку персональных данных',
            'captcha' => 'Подтвердите, что вы не робот. Решите простой пример.',
        ];
    }

}
