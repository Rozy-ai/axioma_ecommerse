<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
//use app\modules\forms\models;
use yii\helpers\Html;

class VacancyWidget extends Widget {

    public function run() {

        $model = new \app\modules\forms\models\VacancyForm;

        return $this->render('vacancy', [
                    'model' => $model,
        ]);
    }

}
