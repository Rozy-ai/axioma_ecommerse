<?php

namespace app\modules\content\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\content\models\Content;

class MenuService extends Widget {

    public $current_id;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Content::getServices();

        return $this->render('menu_service', [
                    'model' => $model,
                    'current_id' => $this->current_id,
        ]);
    }

}
