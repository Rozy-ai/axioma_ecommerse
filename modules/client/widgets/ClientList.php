<?php

namespace app\modules\client\widgets;

use Yii;
use yii\base;
use yii\base\Widget;
use app\modules\client\models\Client;

class ClientList extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $brands = [];

//        $model = Client::find()->all();

//        foreach ($model as $item):
//            $brands[] = ['name' => $item->name, 'url' => '/image/client/' . $item->file_name];
//        endforeach;

        $brands = [
            ['name' => 'Монетка', 'url' => '/image/client/4091_image.png'],
            ['name' => 'Елисей', 'url' => '/image/client/4092_image.png'],
            ['name' => 'Сима лэнд', 'url' => '/image/client/4971_image.png'],
            ['name' => 'Магнит', 'url' => '/image/client/4972_image.png'],
            ['name' => 'DNS', 'url' => '/image/client/740_image.png'],
            ['name' => 'Очки для вас', 'url' => '/image/client/741_image.png'],
            ['name' => 'Мегамарт', 'url' => '/image/client/743_image.png'],
            ['name' => 'Bosco', 'url' => '/image/client/744_image.png'],
            ['name' => 'Tonel', 'url' => '/image/client/745_image.png'],
            ['name' => '100000', 'url' => '/image/client/805_image.png'],
            ['name' => 'Profmax', 'url' => '/image/client/806_image.png'],
            ['name' => 'Рост', 'url' => '/image/client/807_image.png'],
            ['name' => 'Окей', 'url' => '/image/client/808_image.png'],
            ['name' => 'LeruaMerlen', 'url' => '/image/client/809_image.png'],
        ];

        return $this->render('client_list', ['brands' => $brands]);
    }

}
