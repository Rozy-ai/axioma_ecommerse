<?php

namespace app\widgets;

use Yii;

class Social extends \yii\bootstrap\Widget {

    const links = [
        'vk' => 'https://vk.com/aldcompany',
        'fb' => 'https://facebook.com/Aventoland/?ref=bookmarks',
        'insta' => 'https://www.instagram.com/avento_land',
    ];

    public function run() {


        return $this->render('social_' . SITE, ['links' => self::links]);
    }

}
