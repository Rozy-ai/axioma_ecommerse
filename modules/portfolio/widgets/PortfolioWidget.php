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

        foreach (glob(\Yii::getAlias('@webroot') . '/image/portfolio/*.jpg') as $file):
            $images[] = basename($file);
        endforeach;

//        print_r($imgage);
        return $this->render('portfolio', [
                    'images' => $images,
        ]);
    }

}
