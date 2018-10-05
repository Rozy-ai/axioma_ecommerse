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

        $result = [];

        $product = \app\modules\products\models\Product::find()
//                ->where('header', 'LIKE', $search)
                ->andFilterWhere('like', 'header', $search)
                ->all();

        Yii::error($product);

        if ($product) {

            foreach ($product as $item):
                $result[] = [
                    'name' => str_replace($search, '<strong>' . $search . '</strong>', $item->header),
                    'link' => '/catalog/' . $item->url,
                    'image' => '/image/catalog/' . $item->image,
                ];
            endforeach;
        }

        if ($result) {

            foreach ($result as $arr)
                $text .= $this->renderAjax('result', ['result' => $arr]);

            Yii::error($text);

            return $text;
        }

        return false;
    }

}
