<?php

namespace app\modules\options\controllers;

use Yii;
use app\modules\options\models\Options;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Order model.
 */
class AdminController extends \app\controllers\AdminController {

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex() {

//        print_r(Yii::$app->request->post());

        if ($post = Yii::$app->request->post()) {

            foreach ($post['Options']['text'] as $k => $item):

                $model = Options::findOne($k);
                $model->text = $item;
                $model->save();

            endforeach;
        }

        $model = Options::find()->all();

        return $this->render('index', [
                    'model' => $model,
        ]);
    }

}
