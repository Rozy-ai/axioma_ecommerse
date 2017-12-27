<?php

namespace app\modules\robots\controllers;

use Yii;
use yii\web\Controller;
use app\modules\robots\models\Robots;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndex($city) {

        if ($id = \app\modules\city\models\City::getCityIdByName($city)) {

            return Robots::findOne(['city_id' => $id]) ? Robots::findOne(['city_id' => $id])->content : false;
        }
        return false;
    }

}
