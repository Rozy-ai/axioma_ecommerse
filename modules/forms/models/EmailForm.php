<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class EmailForm extends Model {

    public $body = '';
    public $recipient = '';
    public $sender_email = '';
    public $sender_name = 'Axioma email Robot';

    public function init() {

        $this->recipient = Yii::$app->info::get('email');
        $this->sender_email = Yii::$app->params['senderEmail'];
        return parent::init();
    }

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
//    public function rules() {
//        return [
////            [['name', 'phone', 'personal_accept'], 'required'],
////            ['email', 'email'],
////            ['personal_accept', 'in', 'range' => [1]],
//        ];
//    }

    /**
     * @return array customized attribute labels
     */
//    public function attributeLabels() {
//        return [
//            'name' => 'Ваше имя',
////            'phone' => 'Телефон',
//            'personal_accept' => 'Я даю согласие на обратобку персональных данных',
//        ];
//    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact() {
        if ($this->validate()) {

            Yii::$app->mailer->compose()
                    ->setTo([$this->recipient, Yii::$app->params['copyEmail']])
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
