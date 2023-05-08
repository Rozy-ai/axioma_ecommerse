<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends EmailForm {

    public $subject = 'Вопрос с сайта';

    public $name;
    public $email;
    public $message;

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'email', 'message',], 'required'],
            ['email', 'email'],
                        ['captcha', 'required'],
            ['captcha', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя... *',
            'email' => 'Ваш E-mail... *',
            'message' => 'Ваше Сообщение',
                        'captcha' => 'Подтвердите, что вы не робот. Решите простой пример.',
        ];
    }

}
