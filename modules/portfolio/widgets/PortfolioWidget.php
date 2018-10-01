<?php

namespace app\modules\portfolio\widgets;

use yii\base;
use yii\base\Widget;
use yii\db\Expression;
use app\modules\portfolio\models\Portfolio;

class PortfolioWidget extends Widget {

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Portfolio::find()->orderBy(new Expression('rand()'))->all();


        return $this->render('portfolio', [
                    'model' => $model,
        ]);
    }

}
