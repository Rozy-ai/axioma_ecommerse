<?php

namespace app\modules\portfolio\models;

use Yii;

class PortfolioImage extends \app\models\PortfolioImage {

    public function getMain() {
        /*
         * Смотрим были ли изображения
         */

        $model = $this::findAll([
                    'portfolio_id' => $this->portfolio_id,
                    'is_main' => 1,
        ]);

        return $model ? true : false;
    }

    public function afterDelete() {

        $this->setMain();

        return parent::afterDelete();
    }

    public function setMain() {

        /*
         *  Установить главное изображение наобум
         */

        if (!$this->getMain()) {
            $model = $this::find()->all();
            if ($model)
                $model[0]->is_main = 1;
            $model[0]->save();
        }
    }

}
