<?php

namespace app\components;

use yii\captcha\CaptchaAction;

class MathCaptcha extends CaptchaAction {

    public $minLength = 0;
    public $maxLength = 100;

    //public $foreColor = 0x24292f;// цвет цифр

    /**
     * @return string
     */
    protected function generateVerifyCode(): string {
        return mt_rand((int) $this->minLength, (int) $this->maxLength);
    }

    /**
     * @param int $code
     * @return string
     * @throws InvalidConfigException
     */
    protected function renderImage($code): string {
        $code = (int) $code;

        return parent::renderImage($this->getText($code));
    }

    /**
     * @param int $code
     * @return string
     */
    protected function getText(int $code): string {
        $rand = mt_rand(min(1, $code - 1), max(1, $code - 1));
        $operation = mt_rand(0, 1);
        if ($operation === 1)
            return $code - $rand . '+' . $rand;
        else
            return $code + $rand . '-' . $rand;
    }

}
