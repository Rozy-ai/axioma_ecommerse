<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

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

        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
                    [['name', 'phone'], 'required'],
//            ['email', 'email'],
                    ['personal_accept', 'in', 'range' => [1], 'message' => 'Вы должны дать согласие на обработку персональных данных.'],
        ]);
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Введите Ваше имя',
            'Введите телефон' => 'Телефон',
            'personal_accept' => 'Я даю согласие на обработку персональных данных',
            'captcha' => 'Подтвердите, что вы не робот. Введите цифры с картинки.',
        ];
    }

}
