<?php

namespace app\modules\content\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\content\models\Content;

class MenuArticle extends Widget {

    public $current_id;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Content::getArticles();

        return $this->render('menu_article', [
                    'model' => $model,
                    'current_id' => $this->current_id,
        ]);
    }

}
