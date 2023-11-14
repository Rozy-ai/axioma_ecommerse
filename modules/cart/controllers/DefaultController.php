<?php

namespace app\modules\cart\controllers;

use Yii;
use yii\bootstrap\Html;
use yii\web\Controller;
use app\modules\cart\models\Cart;
use yii\helpers\ArrayHelper;
use \app\modules\products\models\Product;
use app\models\ClientForm;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller
{

    public function actionIndex()
    {

        $client = new ClientForm();

        Yii::$app->params['show_viewed'] = false;

        return $this->render('index', [
            'client' => $client,
        ]);
    }

    public function actionAjaxIndex()
    {

        // get Products and count
        $data = Cart::_Products();

        return $this->renderAjax('ajax_index', [
            'model' => $data['models'],
            'counts' => $data['counts'],
        ]);
    }

    public function actionAjaxTopCart()
    {

        $session = Yii::$app->session;

        $model = [];
        $counts = [];

        if (isset($session['cart'])) {

            $data = $session['cart'];

            //            Yii::error($data);

            foreach ($data as $k => $item) :
                $model[] = Product::findOne($k);
                $counts[] = $item;
            endforeach;
        }

        return $this->renderAjax('top_cart', [
            'model' => $model,
            'counts' => $counts,
        ]);
    }

    public function actionUpdateCart()
    {

        $data = Cart::_Products();

        $content = Html::a(
            '<i class="fas fa-times"></i>',
            ['#'],
            ['class' => 'close-btn']
        );

        //        print_r($data['models']);

        if (isset($data['models']) && $data['models']) {
            foreach ($data['models'] as $k => $model)
                $content .= $this->renderAjax('_one_top', [
                    'model' => $model,
                    'count' => $data['counts'][$k],
                ]);

            $content .= Html::a(
                'К ЗАКАЗУ',
                ['/cart'],
                ['class' => 'btn btn-primary center-block']
            );
        } else
            $content = 'Корзина пуста';

        //        return $this->render('top_cart_widget', ['count' => array_sum($data['counts'])]);
        return $this->renderAjax('top_cart_widget', [
            'count' => count($data['counts']),
            'content' => $content,
        ]);
    }

    public function actionAddToCart()
    {

        if (Yii::$app->request->isAjax) {

            $post = Yii::$app->request->post();

            //            Yii::error($post);

            $session = Yii::$app->session;

            if (isset($post['product_id']) && isset($post['count'])) :

                $result = $this->setCart($post);

            //                Yii::error($post);
            //                Yii::error($result);

            endif;
        }

        echo 1;
    }

    public function actionAddToFavorite()
    {

        if (Yii::$app->request->isAjax) {

            $post = Yii::$app->request->post();

            //            Yii::error($post);

            $session = Yii::$app->session;

            if (isset($post['product_id'])) {

                $favorite = Yii::$app->session->get('favorite', []);

                // Add new data to the array
                $favorite[] = $post['product_id'];

                // Save the updated array back to the session
                Yii::$app->session->set('favorite', $favorite);

                // $result = $this->setFavorite($post);

                //                Yii::error($post);
                //                Yii::error($result);

            }
        }

        echo 1;
    }

    public function actionAddToCompare()
    {

        if (Yii::$app->request->isAjax) {

            $post = Yii::$app->request->post();

            //            Yii::error($post);

            $session = Yii::$app->session;

            if (isset($post['product_id'])) {
                // Get the current session array
                $compare = Yii::$app->session->get('compare', []);

                // Add new data to the array
                $compare[] = $post['product_id'];

                // Save the updated array back to the session
                Yii::$app->session->set('compare', $compare);

                // $session->set('compare', [$post['product_id']]);
                // $result = $this->setCompare($post);
                // $session['compare'] = [$post['product_id']];
            }


            //                Yii::error($post);
            //                Yii::error($result);

        }
        echo 1;
        // echo 'compare ok';
    }

    public function actionDeleteToCompare()
    {

        if (Yii::$app->request->isAjax) {

            // Remove data from the array
            unset($_SESSION['compare']);
        }
        echo 1;
        // echo 'compare ok';
    }

    public function actionDelete($id)
    {

        $session = Yii::$app->session;

        if (isset($session['cart'])) {

            $data = [];

            foreach ($session['cart'] as $k => $item) :

                if ($k == $id);
                else
                    $data[$k] = $item;

            endforeach;

            $session['cart'] = $data;
        }
    }

    public function actionSetCount($id, $count)
    {

        $session = Yii::$app->session;

        if (isset($session['cart'])) {

            $data = [];

            foreach ($session['cart'] as $k => $item) :

                if ($k == $id && $count >= 1)
                    $data[$k] = $count;
                else
                    $data[$k] = $item;

            endforeach;

            $session['cart'] = $data;
        }
    }

    private function setCart($post)
    {

        $session = Yii::$app->session;

        if (isset($session['cart'])) {

            $data = $session['cart'];
            $new = true;

            foreach ($session['cart'] as $k => $item) :

                if ($k == $post['product_id']) {
                    $new = false;
                    $data[$k] += $post['count'];
                }

                $data[$k] = $item;

            endforeach;

            if ($new)
                $data[$post['product_id']] = $post['count'];

            $session['cart'] = $data;
        } else {
            $session['cart'] = [$post['product_id'] => $post['count']];
        }

        return $session['cart'];
    }

    private function setFavorite($post)
    {

        $session = Yii::$app->session;

        if (isset($session['favorite'])) {

            $data = $session['favorite'];
            $new = true;

            foreach ($session['favorite'] as $k => $item) :

                if ($k == $post['product_id']) {
                    $new = false;
                }

                $data[$k] = $item;

            endforeach;

            if ($new)
                // $data[$post['product_id']] = $post['count'];

                $session['favorite'] = $data;
        } else {
            $session['favorite'] = [$post['product_id']];
        }

        return $session['favorite'];
    }

    private function setCompare($post)
    {

        $session = Yii::$app->session;

        if (isset($session['compare'])) {

            $data = $session['compare'];
            $new = true;

            foreach ($session['compare'] as $k => $item) :

                if ($k == $post['product_id']) {
                    $new = false;
                }

                $data[$k] = $item;

            endforeach;

            if ($new)
                // $data[$post['product_id']] = $post['count'];

                $session['compare'] = $data;
        } else {
            $session['compare'] = [$post['product_id']];
        }

        return $session['compare'];
    }

    private function getSumm()
    {

        $session = Yii::$app->session;

        $summ = 0;

        if (isset($session['cart'])) {

            $data = $session['cart'];

            foreach ($data as $item) :

                if (isset($item['product_id'])) {
                    $product = Catalog::findOne($item['product_id']);
                    if ($product)
                        $summ += $product->price * $item['count'];
                }
            endforeach;
        }

        return $summ;
    }

    private function getCount()
    {

        $session = Yii::$app->session;

        $count = 0;

        if (isset($session['cart'])) {

            $data = $session['cart'];

            foreach ($data as $item) :
                if (isset($item['product_id']))
                    $count += $item['count'];

            endforeach;
        }

        return $count;
    }
}
