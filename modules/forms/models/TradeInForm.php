<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class TradeInForm extends Model {

    public $name;
    public $email;
    public $phone;
    public $body = '';
    public $recipient = '';
    public $sender_email = '';
    public $sender_name = 'Axioma email Robot';
    public $subject = 'Запрос trade-in';

    public function init() {

        $this->recipient = Yii::$app->info::get('email');
        $this->sender_email = Yii::$app->params['senderEmail'];
        return parent::init();
    }

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'email', 'phone', 'body'], 'required'],
            ['email', 'email'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'body' => 'Сообщение',
            'phone' => 'Телефон',
            'email' => 'E-mail адрес',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact() {
        if ($this->validate()) {

            $this->body = ''
                    . 'Имя: ' . $this->name . PHP_EOL
                    . 'E-mail: ' . $this->email . PHP_EOL
                    . 'Телефон: ' . $this->phone . PHP_EOL
                    . '' . PHP_EOL
                    . $this->body;

            Yii::$app->mailer->compose()
                    ->setTo($this->recipient)
                    ->setFrom([$this->sender_email => $this->sender_name])
                    ->setSubject($this->subject)
                    ->setTextBody($this->body)
                    ->send();

            return true;
        } else {
            Yii::error($this->errors);
            return false;
        }
    }

}
