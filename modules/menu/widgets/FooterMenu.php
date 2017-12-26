<?php

namespace app\modules\menu\widgets;

use Yii;
use yii\base;
use yii\base\Widget;
use app\modules\menu\models\Menu;
use app\modules\menu\models\Core;

class FooterMenu extends Widget {

    const FOOTER_ID = 54;

    public function init() {

        parent::init();
    }

    public function run() {

        $menu = [];

        $menu = Menu::find()->where(['parent_id' => self::FOOTER_ID])->all();

        foreach ($menu as $item):

            $_menu[] = ['title' => $item->name, 'url' => Core::getUrl($item->core_id)];

        endforeach;

        return $this->render('footer_menu', ['menu' => $_menu]);
    }

}
