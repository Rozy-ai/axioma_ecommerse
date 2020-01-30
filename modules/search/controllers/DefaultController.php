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
    public function actionIndex($q, $type = 'product') {

        if ($q) {

            if ($type == 'product')
                $model = $this->getProducts($q);

            if ($type == 'news')
                $model = $this->getPages($q);

            if ($type == 'category')
                $model = $this->getCategory($q);

            \Yii::$app->view->title = 'Поиск: ' . $q;
        } else {
            $model = [];
        }

        Yii::error($model);

        return $this->render('index', [
                    'model' => $model,
                    'type' => $type,
                    'q' => $q,
        ]);
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
                        ->andWhere(['is_enable' => 1])
                        ->orderBy(['header' => SORT_ASC])
                        ->all();
    }

    private function getCategory($search) {

        return \app\modules\category\models\Category::find()
                        ->where(['like', 'header', $search])
                        ->andWhere(['is_enable' => 1])
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

            $text = '';

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

    private function getPages($search) {

//        Yii::error($search);
//
//        $model = \app\modules\content\models\Content::find()
//                ->where(['is_enable' => 1, 'type_id' => [1, 3]])
//                ->andWhere(['like', 'header', $search])
////                ->orWhere(['like', 'content', '%' . $search . '%'])
////                ->andWhere(['is_enable' => 1, 'type_id' => [1, 3]]) // Новости, страницы
//                ->all();
//
//        $query = \app\modules\content\models\Content::find()
//                ->where(['is_enable' => 1, 'type_id' => [1, 3]])
//                ->andWhere(['like', 'header', $search]);
//
//        Yii::error($query->createCommand()->getRawSql());
//        Yii::error($model);


        return \app\modules\content\models\Content::find()
                        ->where(['like', 'header', $search])
                        ->orWhere(['like', 'content', $search])
                        ->andWhere(['is_enable' => 1, 'type_id' => [1, 3]]) // Новости, страницы
                        ->all();
        ;
    }

}
