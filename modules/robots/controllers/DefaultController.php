<?php

namespace app\modules\robots\controllers;

use Yii;
use yii\web\Controller;
use app\modules\robots\models\Robots;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndex() {

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'text/plain');


        return Robots::findOne(['city_id' => Yii::$app->city->getId()]) ?
                Robots::findOne(['city_id' => Yii::$app->city->getId()])->content : false;
    }

}
