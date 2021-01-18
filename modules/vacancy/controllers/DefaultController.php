<?php

namespace app\modules\vacancy\controllers;

use Yii;
use yii\web\Controller;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndex() {

        Yii::error(Yii::$app->city->id);

        $active = \app\modules\vacancy\models\Vacancy::findAll([
                    'is_close' => [0, NULL],
                    'city_id' => Yii::$app->city->id,
        ]);
        $inactive = \app\modules\vacancy\models\Vacancy::findAll([
                    'is_close' => 1,
                    'city_id' => Yii::$app->city->id,
        ]);
        return $this->render('index', [
                    'active' => $active,
                    'inactive' => $inactive,
                    'model' => \app\modules\content\models\Content::findOne(['url' => 'vacancy'])
        ]);
    }

}
