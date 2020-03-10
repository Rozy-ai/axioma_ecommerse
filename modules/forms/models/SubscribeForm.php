<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SubscribeForm extends EmailForm {

    public $email;
    public $subject = 'Подписка на рассылку';

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['email'], 'required'],
            ['email', 'email'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'email' => 'Ваш E-mail... *',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
//    public function contact($email) {
//        if ($this->validate()) {
//
//            Yii::$app->mailer->compose('message', [
//                        'content' => $this->message,
//                        'imageFileName' => Yii::getAlias('@app') . '/web/image/logo_email.png'
//                    ])
//                    ->setTo($email)
//                    ->setFrom([$this->email => $this->name])
//                    ->setSubject(self::SUBJECT)
//                    ->send();
//
//            return true;
//        }
//        return false;
//    }
}
