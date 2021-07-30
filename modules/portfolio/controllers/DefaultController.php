<?php

namespace app\modules\portfolio\controllers;

use Yii;
use yii\web\Controller;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndex() {

        $model = \app\modules\portfolio\models\Portfolio::find()
                ->orderBy('order desc')
                ->all();

        return $this->render('index.twig', [
                    'model' => $model,
        ]);
    }

}
