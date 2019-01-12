<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RassrochkaForm extends Model {

    public $name_organization;
    public $inn;
    public $email;
    public $summ;
    public $time;
    public $phone;
    public $body = '';
    public $recipient = '';
    public $sender_email = '';
    public $sender_name = 'Axioma email Robot';
    public $subject = 'Запрос рассрочки';
    public $_time = [
        '10' => '10 дней',
        '20' => '20 дней',
        '30' => '30 дней',
        '45' => '45 дней',
    ];

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
            [['name_organization', 'inn', 'email', 'summ', 'phone', 'time'], 'required'],
            ['email', 'email'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name_organization' => 'ИМЯ ОРГАНИЗАЦИИ',
            'inn' => 'ИНН',
            'summ' => 'СУММА',
            'phone' => 'ТЕЛЕФОН',
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
                    . 'Организация: ' . $this->name_organization . PHP_EOL
                    . 'ИНН: ' . $this->inn . PHP_EOL
                    . 'email: ' . $this->email . PHP_EOL
                    . 'Сумма: ' . $this->summ . PHP_EOL
                    . 'Срок: ' . $this->time . ' дней' . PHP_EOL
                    . 'Телефон: ' . $this->phone . PHP_EOL
                    . '';

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
