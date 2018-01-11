<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SendReviewForm extends EmailForm {

    public $name;
    public $email;
    public $review;
    public $personal_accept;
    public $subject = 'Оставлен отзыв';

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'email', 'review', 'personal_accept'], 'required'],
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
            'review' => 'Ваш отзыв',
            'email' => 'E-mail',
            'personal_accept' => 'Я даю согласие на обратобку персональных данных',
        ];
    }

}
