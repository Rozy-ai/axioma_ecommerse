<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

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
    public $subject = 'Заказ в 1 клик';

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'phone', 'personal_accept', 'count', 'good'], 'required'],
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
            'count' => 'Количество',
            'good' => 'Товар',
            'personal_accept' => 'Я даю согласие на обработку персональных данных',
        ];
    }

}
