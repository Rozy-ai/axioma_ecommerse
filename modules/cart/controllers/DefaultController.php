<?php

namespace app\modules\cart\controllers;

use Yii;
use yii\web\Controller;
use app\modules\cart\models\Cart;
use yii\helpers\ArrayHelper;
use app\modules\catalog\models\Catalog;

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

            foreach ($data as $item):
                if (isset($item['product_id'])) {
                    $model[] = Catalog::findOne($item['product_id']);
                    $counts[] = $item['count'];
                }
            endforeach;
        }

        return $this->renderAjax('ajax_index', [
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

            if (isset($post['product_id']) && isset($post['count'])):

                $this->setCart($post);

            endif;
        }

        echo 1;
    }

    public function actionDelete($id) {

        $session = Yii::$app->session;

        if (isset($session['cart'])) {

            $data = $session['cart'];

            foreach ($data as $k => $item):

                if (isset($item['product_id']) && $item['product_id'] == $id)
                    unset($data[$k]);

            endforeach;

            $session['cart'] = $data;
        }
    }

    public function actionSetCount($id, $count) {

        $session = Yii::$app->session;

        if (isset($session['cart'])) {

            $data = $session['cart'];

            foreach ($data as $k => &$item):

                if (isset($item['product_id']) && $item['product_id'] == $id)
                    $item['count'] = $count;

            endforeach;

            $session['cart'] = $data;
        }
    }


    private function setCart($post) {

        $new = 1;

        $session = Yii::$app->session;

        if (isset($session['cart'])) {

            $data = $session['cart'];

            foreach ($data as &$item):

                if (isset($item['product_id']))
                    if ($item['product_id'] == $post['product_id']) {
                        $item['count'] = $item['count'] + $post['count'];
                        $new = 0;
                    }

            endforeach;

            if ($new) {
                $data[] = $post;
                $session['cart'] = $data;
            } else {
                $session['cart'] = $data;
            }
        } else {
            $session['cart'] = $post;
        }
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
