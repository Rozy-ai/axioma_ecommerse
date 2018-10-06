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

        $searchModel = new \app\modules\products\models\ProductSearch();
        $dataProvider = $searchModel->search(
                ['ProductSearch' => ['header' => $search]]
        );

        $product = $dataProvider->getModels();

        if ($product) {

            foreach ($product as $item):
                $result[] = [
                    'type' => 'product',
                    'name' => str_replace($search, '<strong>' . $search . '</strong>', $item->header),
                    'url' => '/catalog/' . $item->url,
                    'image' => $item->image,
                    'article' => $item->article,
                    'category' => $item->category_id,
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
