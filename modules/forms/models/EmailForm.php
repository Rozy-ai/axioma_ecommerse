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
    public $title;

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
//            ['title', 'required'],
            ['title', 'in', 'range' => ['']],
        ];
    }

    /**
     * @return array customized attribute labels
     */
//    public function attributeLabels() {
//        return [
//            'name' => 'Ваше имя',
////            'phone' => 'Телефон',
//            'personal_accept' => 'Я даю согласие на обработку персональных данных',
//        ];
//    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact() {
        if ($this->validate()) {
            if(isset($this->phone)){
                $leadData = [
                    'form' => [
                        ['key' => 'Заголовок', 'value' => $this->subject], 
                        ['key' => 'Name', 'value' => $this->name], 
                        ['key' => 'Phone', 'value' => $this->phone], 
                        ['key' => 'Сообщение', 'value' => $this->body], 
                    ],
                    'utm' => [ // передаем UTM-метки
                        "utm_source" =>  $_COOKIE['utm_source'],
                        "utm_medium" => $_COOKIE['utm_medium'],
                        "utm_content" => $_COOKIE['utm_content'],
                        "utm_term" =>  $_COOKIE['utm_term'],
                        "utm_campaign" => $_COOKIE['utm_campaign'],
                    ],
                    'host' => "axioma.pro", // домен вашего сайта (ОБЯЗАТЕЛЬНО)
                    'token' => "bfac5b47-a495-4c8c-b417-1f8be495a64e", // сюда вводите токен из настроек сайта на стороне amoCRM (ОБЯЗАТЕЛЬНО)
                ];
            } else {
                $leadData = [
                    'form' => [
                        ['key' => 'Заголовок', 'value' => $this->subject], 
                        ['key' => 'Name', 'value' => $this->name], 
                        ['key' => 'Email', 'value' => $this->email], 
                        ['key' => 'Сообщение', 'value' => $this->body], 
                    ],
                    'utm' => [ // передаем UTM-метки
                        "utm_source" =>  $_COOKIE['utm_source'],
                        "utm_medium" => $_COOKIE['utm_medium'],
                        "utm_content" => $_COOKIE['utm_content'],
                        "utm_term" =>  $_COOKIE['utm_term'],
                        "utm_campaign" => $_COOKIE['utm_campaign'],
                    ],
                    'host' => "axioma.pro", // домен вашего сайта (ОБЯЗАТЕЛЬНО)
                    'token' => "bfac5b47-a495-4c8c-b417-1f8be495a64e", // сюда вводите токен из настроек сайта на стороне amoCRM (ОБЯЗАТЕЛЬНО)
                ];
            }

            $leadData = json_encode($leadData);
            $output= shell_exec("curl -X POST https://webhook.gnzs.ru/ext/site-int/amo/29896285?gnzs_token=bfac5b47-a495-4c8c-b417-1f8be495a64e -H 'Content-Type: application/json' -d '{$leadData}'");
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
