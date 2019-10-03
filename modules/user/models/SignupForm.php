<?php

namespace app\modules\user\models;

use app\modules\auth\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $username;
    public $email;
    public $password;
    public $passwordConfirmation;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'app\modules\auth\models\User', 'message' => Yii::t('app', 'ERROR_LOGIN')],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\modules\auth\models\User', 'message' => Yii::t('app', 'ERROR_EMAIL')],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['passwordConfirmation', 'required'],
            ['passwordConfirmation', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => Yii::t('app', 'SIGNUP_LOGIN'),
            'email' => Yii::t('app', 'SIGNUP_EMAIL'),
            'password' => Yii::t('app', 'SIGNUP_PASSWORD'),
            'passwordConfirmation' => Yii::t('app', 'SIGNUP_PASSWORD_CONFIRMATION')
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {

        if (!$this->validate()) {
            return null;
        }

        $account = new User();
        if ($this->password == $this->passwordConfirmation) {
            $account->username = $this->username;
            $account->email = $this->email;
            $account->setPassword($this->password);
            $account->auth_key = $account->generateAuthKey();

            return $account->save() ? $account : null;
        } else {
            return null;
        }
    }

}
