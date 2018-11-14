<?php

namespace app\modules\search\controllers;

use Yii;
use yii\bootstrap\Html;
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

        $model = $this->getProducts($q);

        \Yii::$app->view->title = 'Поиск: ' . $q;

        return $this->render('index', ['model' => $model]);
    }

    public function actionAjaxSearch() {

        if (Yii::$app->request->isAjax) {

            $q = Yii::$app->request->post()['q'];

//            if ($q && (count($q) > 3))
            if ($q)
                return $this->getResult(Yii::$app->request->post()['q']);
        }
    }

    private function getProducts($search) {

        return \app\modules\products\models\Product::find()
                        ->where(['like', 'header', $search])
                        ->orderBy(['header' => SORT_ASC])
                        ->all();
    }

    private function getResult($search) {

        $result = [];

        $searchModel = new \app\modules\products\models\ProductSearch();
        $dataProvider = $searchModel->search(
                ['ProductSearch' => ['header' => $search]]
        );

        $product = $dataProvider->getModels();

        if ($product) {

            foreach ($product as $k => $item):

                if ($k > 4)
                    continue;

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

            foreach ($result as $k => $arr) {

                $text .= $this->renderAjax('result', ['result' => $arr]);
            }

            $text .= $this->renderAjax('last_row', [
                'count' => count($product),
                'q' => $search,
            ]);

            return Html::tag('div', $text, ['class' => 'wrap']);
        }

        return false;
    }

}
