<?php

namespace app\modules\order\controllers;

use Yii;
use yii\bootstrap\Html;
use yii\web\Controller;
use app\models\ClientForm;
use app\modules\catalog\models\Catalog;
use app\modules\order\models\Order;
use app\modules\order\models\OrderItem;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndex() {

        return $this->render('index', [
        ]);
    }

    public function actionAdd() {

        return $this->render('add', [
        ]);
    }

    public function actionView() {

        $client = new ClientForm();

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

            if ($client->load(Yii::$app->request->post()) && $client->validate()) {

                $order = new Order();
                $order->client_name = $client->name;
                $order->email = $client->email;
                $order->phone = $client->phone;
                $order->city_id = Yii::$app->city->getId();
                $order->created_at = time();

                if ($order->save()) {

                    foreach ($data as $k => $item):
                        if (isset($item['product_id'])) {
                            $order_item = new OrderItem();
                            $order_item->order_id = $order->id;
                            $order_item->good_id = $item['product_id'];
                            $order_item->name = Catalog::getName($item['product_id']);
                            $order_item->count = $counts[$k];
                            $order_item->price = Catalog::getPrice($item['product_id']);

                            if ($order_item->save()) {
                                $session['cart'] = [];
                                $this->redirect('thankyou');
                            } else
                                print_r($order->errors);
                        }
                    endforeach;

                    $this->sendClientMail($order->email);
                    $this->sendAdminMail($order->id);

                    $session['cart'] = [];
                } else {

                    print_r($order->errors);
                }

//                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('view', [
                    'client' => $client,
                    'model' => $model,
                    'counts' => $counts,
        ]);
    }

    public function actionThankyou() {

        return $this->render('thank_you');
    }

    private function sendClientMail($email) {

        Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => 'Axioma email Robot'])
                ->setSubject('Axioma order')
                ->setTextBody('Ваш заказ принят и обрабатывается.')
                ->send();
    }

    private function sendAdminMail($order_id) {

        Yii::$app->mailer->compose()
                ->setTo(\app\modules\options\models\Options::getVal('email'))
                ->setFrom([Yii::$app->params['senderEmail'] => 'Axioma email Robot'])
                ->setSubject('Новый заказ')
                ->setHtmlBody(Html::a('Заказ', ['https://axioma.pro/order/admin/view/' . $order_id]))
                ->send();
    }

}
