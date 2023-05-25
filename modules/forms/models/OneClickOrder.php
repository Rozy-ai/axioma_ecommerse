<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * ContactForm is the model behind the contact form.
 */
class OneClickOrder extends EmailForm {

    public $name;
    public $phone;
    public $good;
    public $count;
    public $email;
    public $personal_accept;
    public $subject = 'Узнать цену';

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
                    [['name', 'phone', 'personal_accept', 'count', 'good'], 'required'],
                    ['personal_accept', 'in', 'range' => [1]],
                    ['captcha', 'required'],
                    ['captcha', 'captcha'],
        ]);
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Телефон',
            'count' => 'Количество',
            'good' => 'Товар',
            'personal_accept' => 'Я даю согласие на обработку персональных данных',
            'captcha' => 'Подтвердите, что вы не робот. Введите цифры с картинки.',
        ];
    }

}
