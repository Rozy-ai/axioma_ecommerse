<?php

namespace app\modules\cart\controllers;

use Yii;
use yii\web\Controller;
use app\modules\cart\models\Cart;
use yii\helpers\ArrayHelper;
use \app\modules\products\models\Product;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndex() {

        return $this->render('index', []);
    }

    public function actionAjaxIndex() {

        $session = Yii::$app->session;

        $model = [];
        $counts = [];

        if (isset($session['cart'])) {

            $data = $session['cart'];

            Yii::error($data);

            foreach ($data as $k => $item):
                $model[] = Product::findOne($k);
                $counts[] = $item;
            endforeach;
        }

        return $this->renderAjax('ajax_index', [
                    'model' => $model,
                    'counts' => $counts,
        ]);
    }

    public function actionAjaxTopCart() {

        $session = Yii::$app->session;

        $model = [];
        $counts = [];

        if (isset($session['cart'])) {

            $data = $session['cart'];

            Yii::error($data);

            foreach ($data as $k => $item):
                $model[] = Product::findOne($k);
                $counts[] = $item;
            endforeach;
        }

        return $this->renderAjax('top_cart', [
                    'model' => $model,
                    'counts' => $counts,
        ]);
    }

    public function actionUpdateCart() {

        $session = Yii::$app->session;

//        print_r($session['cart']);

        $model = ['summ' => $this->getSumm(), 'count' => $this->getCount()];

        return $this->renderAjax('update_cart', ['model' => $model]);
    }

    public function actionAddToCart() {

        if (Yii::$app->request->isAjax) {

            $post = Yii::$app->request->post();

            $session = Yii::$app->session;

            if (isset($post['product_id']) && isset($post['count'])):

                $result = $this->setCart($post);

                Yii::error($post);
                Yii::error($result);

            endif;
        }

        echo 1;
    }

    public function actionDelete($id) {

        $session = Yii::$app->session;

        if (isset($session['cart'])) {

            $data = [];

            foreach ($session['cart'] as $k => $item):

                if ($k == $id)
                    ;
                else
                    $data[$k] = $item;

            endforeach;

            $session['cart'] = $data;
        }
    }

    public function actionSetCount($id, $count) {

        $session = Yii::$app->session;

        if (isset($session['cart'])) {

            $data = [];

            foreach ($session['cart'] as $k => $item):

                if ($k == $id && $count > 2)
                    $data[$k] = $count;
                else
                    $data[$k] = $item;

            endforeach;

            $session['cart'] = $data;
        }
    }

    private function setCart($post) {

        $session = Yii::$app->session;

        if (isset($session['cart'])) {

            $data = $session['cart'];

            foreach ($data as $k => &$item):

                if ($k == $post['product_id']) {

                    $item[$k] += $post['count'];
                }
            endforeach;
        } else {
            $session['cart'] = [$post['product_id'] => $post['count']];
        }

        return $session['cart'];
    }

    private function getSumm() {

        $session = Yii::$app->session;

        $summ = 0;

        if (isset($session['cart'])) {

            $data = $session['cart'];

            foreach ($data as $item):

                if (isset($item['product_id'])) {
                    $product = Catalog::findOne($item['product_id']);
                    if ($product)
                        $summ += $product->price * $item['count'];
                }
            endforeach;
        }

        return $summ;
    }

    private function getCount() {

        $session = Yii::$app->session;

        $count = 0;

        if (isset($session['cart'])) {

            $data = $session['cart'];

            foreach ($data as $item):
                if (isset($item['product_id']))
                    $count += $item['count'];

            endforeach;
        }

        return $count;
    }

}
