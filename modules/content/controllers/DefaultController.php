<?php

namespace app\modules\slider\controllers;

use Yii;
use yii\web\Controller;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndex() {

        return $this->render('index', [
        ]);
    }

}
