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

    public $admin_mail_body;

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

//            print_r($data);
//            exit();

            foreach ($data as $k => $item):
                $model[] = Catalog::findOne($k);
                $counts[] = $item;
            endforeach;

            if ($client->load(Yii::$app->request->post()) && $client->validate()) {

                $order = new Order();
                $order->client_name = $client->name;
                $order->email = $client->email;
                $order->phone = $client->phone;
//                $order->city_id = Yii::$app->city->getId();
                $order->created_at = time();

                if ($order->save()) {

                    $this->admin_mail_body = 'Заказ ' . $order->id . PHP_EOL .
                            'Покупатель ' . $order->client_name . PHP_EOL .
                            'Email ' . $order->email . PHP_EOL .
                            'Телефон ' . $order->phone . PHP_EOL .
                            'Город ' . (\app\modules\city\models\City::findOne(Yii::$app->city->getId()))->name . PHP_EOL .
                            ' --------------- ' . PHP_EOL .
                            '';

                    foreach ($data as $k => $item):
                        $order_item = new OrderItem();
                        $order_item->order_id = $order->id;
                        $order_item->good_id = $k;
                        $order_item->name = Catalog::getName($k);
                        $order_item->count = $item;
                        $order_item->price = Catalog::getPrice($k);

                        if ($order_item->save()) {

                            $this->admin_mail_body .=  $order_item->name . ' | '
                                    . $order_item->count . ' шт. '. PHP_EOL;
//                                $session['cart'] = [];
//                                $this->redirect('thankyou');
                        } else
                            print_r($order->errors);
                    endforeach;

                    $this->sendClientMail($order->email);
                    $this->sendAdminMail($order->id);

                    $session['cart'] = [];
                    $this->redirect('thankyou');
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


        Yii::$app->mailer->compose('message', [
                    'content' => 'Спасибо за ваш заказ. В ближайшее время с вами свяжется специалист.',
                    'imageFileName' => Yii::getAlias('@app') . '/web/image/logo_email.png'
                ])
//                ->setTo('info@kognitiv.ru')
                ->setTo($email)
                ->setFrom([Yii::$app->params['senderEmail'] => 'Axioma email Robot'])
                ->setSubject('Axioma order')
//                    ->setTextBody($this->message)
                ->send();

//        Yii::$app->mailer->compose()
//                ->setTo($email)
//                ->setFrom([Yii::$app->params['senderEmail'] => 'Axioma email Robot'])
//                ->setSubject('Axioma order')
//                ->setTextBody('Спасибо за ваш заказ. В ближайшее время с вами свяжется специалист.')
//                ->send();
    }

    private function sendAdminMail($order_id) {


        Yii::$app->mailer->compose()
                ->setTo([\app\modules\info\models\Info::get('email'), Yii::$app->params['copyEmail']])
                ->setFrom([Yii::$app->params['senderEmail'] => 'Axioma email Robot'])
                ->setSubject('Новый заказ № '.$order_id)
                ->setTextBody($this->admin_mail_body)
                ->send();
    }

}
