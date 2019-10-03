<?php

namespace app\modules\user\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;

class User extends ActiveRecord implements IdentityInterface {

    public $password;
    public $password_repeat;
    public $is_adminka;

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public function beforeValidate() {

        if ($this->isNewRecord)
            $this->created_at = time();

        $this->updated_at = time();

        return parent::beforeValidate();
    }

    public static function tableName() {
        return '{{%user}}';
    }

    public function rules() {
        return [
            [['updated_at', 'created_at'], 'integer'],
            [['auth_key'], 'string', 'max' => 32],
            [['username', 'password_hash', 'email'], 'string', 'max' => 255],
            [['password_reset_token'], 'string', 'max' => 255],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
            [['email'], 'unique'],
            [['username'], 'unique'],
        ];
    }

    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username) {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByEmail($email) {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                    'status' => self::STATUS_ACTIVE,
        ]);
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->auth_key === $authKey;
    }

    public function validatePassword($password) {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password) {
        $this->password_hash = \Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = \Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public static function getUserNameById($id) {

        return ($model = self::findOne($id)) ? $model->username : 'не найдено';
    }

}
