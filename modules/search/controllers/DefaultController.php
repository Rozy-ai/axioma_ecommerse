<?php

namespace app\modules\search\controllers;

use Yii;
use yii\web\Controller;
use app\modules\catalog\models\Catalog;

/**
 * Default controller for the `object` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($q) {

        $model = Catalog::find()->filterWhere(['like', 'content', $q])->all();

        \Yii::$app->view->title = 'Поиск: ' . $q;

        return $this->render('index', ['model' => $model]);
    }

    public function actionAjaxSearch() {

        if (Yii::$app->request->isAjax) {

            if (isset(Yii::$app->request->post()['q']))
                return $this->getResult(Yii::$app->request->post()['q']);
        }
    }

    private function getResult($search) {

        $result;

        for ($i = 1; $i < 4; $i++)
            $result .= $this->renderAjax('result');

        return $result;
    }

}
