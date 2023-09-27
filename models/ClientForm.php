<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ClientForm extends Model {

    public $name;
    public $email;
    public $phone;
    public $personal_accept;
    public $title;

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'phone', 'personal_accept'], 'required'],
            // email has to be a valid email address
            ['personal_accept', 'in', 'range' => [1]],
            ['email', 'email'],
            ['title', 'in', 'range' => ['']],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'personal_accept' => 'Я даю согласие на обратобку персональных данных',
            // 'captcha' => 'Подтвердите, что вы не робот. Решите простой пример.',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email) {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                    ->setTo($email)
                    ->setFrom([$this->email => $this->name])
                    ->setSubject($this->subject)
                    ->setTextBody($this->body)
                    ->send();

            return true;
        }
        return false;
    }

}
