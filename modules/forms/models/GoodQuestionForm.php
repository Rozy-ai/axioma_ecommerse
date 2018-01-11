<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class GoodQuestionForm extends EmailForm {

    public $name;
    public $phone;
    public $email;
    public $question;
    public $personal_accept;
    public $subject = 'Посетитель задал вопрос';

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'phone', 'email', 'question', 'personal_accept'], 'required'],
            ['email', 'email'],
            ['personal_accept', 'in', 'range' => [1]],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'question' => 'Какой у вас вопрос',
            'personal_accept' => 'Я даю согласие на обратобку персональных данных',
        ];
    }

}
