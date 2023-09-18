<?php

namespace app\modules\order\controllers;

use Yii;
use yii\bootstrap\Html;
use yii\web\Controller;
use app\models\ClientForm;
use app\modules\catalog\models\Catalog;
use app\modules\order\models\Order;
use app\modules\order\models\OrderItem;
use yii\httpclient\Client;
use yii\helpers\Json;

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
                    $this->sendAmo($order);

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

    private function sendAmo($order) {
    $leadData = [
        'form' => [
            ['key' => 'Name', 'value' => $order->client_name], 
            ['key' => 'Phone', 'value' => $order->phone], 
            ['key' => 'Email', 'value' => $order->email], 
            ['key' => 'Город', 'value' => (\app\modules\city\models\City::findOne(Yii::$app->city->getId()))->name], 
            ['key' => 'Заказ', 'value' => $order->id], 
            // ['key' => 'name', 'value' => 'Алексей'], // передаем имя
            // // ... аналогично передаем любые данные, где key - название поле, а value - значение
            // // пример объекта для создания заказа в МС
            // [
            //     'key' => 'order',
            //     'value' => [
            //         "products": [
            //             [
            //                 "name" => "Кроссовки Nike",
            //                 "quantity" => "2",
            //                 "amount" => "6400",
            //                 "externalid" => "Hc4f6gOxnAmdIPSNgcvR", // ID товара в системе МойСклад
            //                 "price" => "3200"
            //             ],
            //             [
            //                 "name" => "Джоггеры Ninja",
            //                 "quantity" => "1",
            //                 "amount" => "2990",
            //                 "externalid" => "kc4f6gOxnAmdd43NgcvR", // ID товара в системе МойСклад
            //                 "price" => "2990"
            //             ]
            //         ],
            //         "amount" => "6400",
            //         "delivery" => "Самовывоз из шоурума",
            //         "delivery_price" => "500",
            //         "delivery_address" => "RU: Poasdint: м. Тульская, Духовской переулок, 17с1 (Самовывоз Phenomenal studio)101000, Москва",
            //         "delivery_comment" => "Позвонить заранее",
            //     ]
            // ]
        ],
        'utm' => [ // передаем UTM-метки
            "utm_source" =>  $_COOKIE['utm_source'],
            "utm_medium" => $_COOKIE['utm_medium'],
            "utm_content" => $_COOKIE['utm_content'],
            "utm_term" =>  $_COOKIE['utm_term'],
            "utm_campaign" => $_COOKIE['utm_campaign'],
        ],
        // 'clientID' => [ // передаем ID для аналитики
        //     "gclientid" => "your_site_value", // Google analytics ClientID
        //     "roistat" => "your_site_value", // Roistat"
        //     "_ym_uid" => "your_site_value", // Yandex metric ClientID
        // ],
        'host' => "axioma.pro", // домен вашего сайта (ОБЯЗАТЕЛЬНО)
        'token' => "bfac5b47-a495-4c8c-b417-1f8be495a64e", // сюда вводите токен из настроек сайта на стороне amoCRM (ОБЯЗАТЕЛЬНО)
    ];
    
    // отправляем данные на интеграцию
    $this->sendToGnzs($leadData);
    
    // функция отправки данных на интеграцию

    
    }

    private function sendToGnzs($leadData) {
        $leadData = json_encode($leadData);
        
        $output= shell_exec("curl -X POST https://webhook.gnzs.ru/ext/site-int/amo/29896285?gnzs_token=bfac5b47-a495-4c8c-b417-1f8be495a64e -H 'Content-Type: application/json' -d '{$leadData}'");
    }
}
