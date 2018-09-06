<?php

namespace app\modules\slider\controllers;

use Yii;
use yii\web\Controller;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class ShowController extends Controller {

    public function actionIndex() {

        return $this->render('index', [
        ]);
    }

    public function actionNews() {

        $model = \app\modules\content\models\Content::find()
                ->where(['type_id' => 3, 'is_enable' => 1])
                ->all();

        return $this->render('news_index', [
                    'model' => $model,
        ]);
    }

}
