<?php

namespace app\modules\forms\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends EmailForm {

    public $subject = 'Вопрос с сайта';
    public $name;
    public $email;
    public $phone;
    public $file;
    public $message;

//    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        $rules = parent::rules();

        return ArrayHelper::merge($rules, [
                    [['name', 'email', 'message','phone'], 'required'],
                    ['email', 'email'],
                    [['file'], 'file', 'extensions' => 'jpeg, png, webp, jpg, pdf, txt, doc, docx, xlsx, xls', 'maxFiles' => 4,'maxSize' => 10 * 1024 * 1024,'tooBig' => 'Размер не должен превышать 10 МиБ.'],
        ]);
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'name' => 'Введите ваше имя',
            'email' => 'Введите ваш е-mail',
            'phone' => 'Введите ваш телефон',
            'message' => 'Введите ваш вопрос',
            'file' => 'Прикрепить файл',
            'captcha' => 'Подтвердите, что вы не робот. Введите цифры с картинки.',
        ];
    }

}
