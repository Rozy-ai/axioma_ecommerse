<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

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
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
                    [['name', 'email', 'message',], 'required'],
                    ['email', 'email'],
        ]);
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя... *',
            'email' => 'Ваш E-mail... *',
            'message' => 'Ваше Сообщение',
            'captcha' => 'Подтвердите, что вы не робот. Введите цифры с картинки.',
        ];
    }

}
