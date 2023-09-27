<?php

namespace app\modules\forms\controllers;

use Yii;
use yii\web\Controller;
use app\modules\forms\models\CallBackForm;
use app\modules\forms\models\GoodQuestionForm;
use app\modules\forms\models\OneClickOrder;
use \app\modules\forms\models\SendReviewForm;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

//    public function actionIndex() {
//
//        return $this->render('index', [
//        ]);
//    }

    public function actionEcpOrder() {

        if (Yii::$app->request->isAjax) {

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model = new \app\modules\forms\models\EcpOrder();

            if ($model->load(Yii::$app->request->post())) {

                $model->body = $model->name .
                        ' (' . str_replace(['(', ')', '-', ''], '', $model->phone) . ')' . PHP_EOL
                        . 'email - ' . $model->email . ' | ИНН - ' . $model->inn
                        . ' заказал консультацию';

                if ($model->contact())
                    return 1;
                else
                    return 0;
            }
        }
    }

    public function actionCallEcp() {

        if (Yii::$app->request->isAjax) {

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model = new \app\modules\forms\models\MarkirovkaOrder();

            if ($model->load(Yii::$app->request->post())) {

                $model->body = $model->name .
                        ' (' . str_replace(['(', ')', '-', ''], '', $model->phone) . ')' . PHP_EOL
                        . 'email - ' . $model->email . ' | ИНН - ' . $model->inn
                        . ' заказал консультацию';

                if ($model->contact())
                    return 1;
                else
                    return 0;
            }
        }
    }

    public function actionMarkirovkaOrder() {

        if (Yii::$app->request->isAjax) {

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model = new \app\modules\forms\models\MarkirovkaOrder();

            if ($model->load(Yii::$app->request->post())) {

                $model->body = $model->name .
                        ' (' . str_replace(['(', ')', '-', ''], '', $model->phone) . ')' . PHP_EOL
                        . 'email - ' . $model->email . ' | ИНН - ' . $model->inn
                        . ' заказал консультацию';

                if ($model->contact())
                    return 1;
                else
                    return 0;
            }
        }
    }

    public function actionCallBack() {

        if (Yii::$app->request->isAjax) {

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model = new CallBackForm();

            if ($model->load(Yii::$app->request->post())) {

                $model->body = $model->name . ' (' . str_replace(['(', ')', '-', ''], '', $model->phone) . ')' . ' заказал звонок';

                if ($model->contact())
                    return 1;
                else
                    return 0;
            }
        }
    }

    public function actionGoodQuestion() {

        if (Yii::$app->request->isAjax) {

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model = new GoodQuestionForm();

            if ($model->load(Yii::$app->request->post())) {

                $model->body = $model->name . ' (' . str_replace(['(', ')', '-', ''], '', $model->phone) . ')' . ' спрашивает: ' . $model->question;

                if ($model->contact())
                    return 1;
                else
                    return 0;
            }
        }
    }

    public function actionContactForm() {

        if (Yii::$app->request->isAjax) {

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model = new \app\modules\forms\models\ContactForm();

            if ($model->load(Yii::$app->request->post())) {

                $model->body = $model->name . '( ' . $model->email . ' )' . ' спрашивает: ' . $model->message;

                if ($model->contact())
                    return 1;
                else
                    return 0;
            }
        }
    }

    public function actionOneClick() {
        
        if (Yii::$app->request->isAjax) {

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model = new OneClickOrder();

            if ($model->load(Yii::$app->request->post())) {

                $model->body = $model->name . ' (' . str_replace(['(', ')', '-', ''], '', $model->phone) . ')' . ' заказал: ' . $model->good . ' (' . $model->count . ' шт) ' . PHP_EOL;
                $model->body .= 'Город: ' . Yii::$app->city->name;

                if ($model->contact())
                    return 1;
                else
                    return 0;
            }
        }
    }

    public function actionSendReview() {

        if (Yii::$app->request->isAjax) {

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $model = new SendReviewForm();

            if ($model->load(Yii::$app->request->post())) {

                $model->body = $model->name . ' (' . $model->email . ')' . ' оставил отзыв: ' . $model->review;

                if ($model->contact())
                    return 1;
                else
                    return 0;
            }
        }
    }

    public function actionRassrochka() {

        $model = new \app\modules\forms\models\RassrochkaForm();

        if ($model->load(Yii::$app->request->post())) {


            if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                if ($model->contact()) {

                    Yii::$app->session->setFlash('success', 'Заявка отправлена.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка отправки.');
            }


            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionTradeIn() {

        $model = new \app\modules\forms\models\TradeInForm;

        if ($model->load(Yii::$app->request->post())) {


            if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                if ($model->contact()) {

                    Yii::$app->session->setFlash('success', 'Собщение отправлено.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка отправки.');
            }


            return $this->redirect(Yii::$app->request->referrer);
        }
    }

    public function actionSubscribe() {

        $model = new \app\modules\forms\models\SubscribeForm();

        if ($model->load(Yii::$app->request->post())) {


            if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                if ($model->contact()) {

                    Yii::$app->session->setFlash('success', 'Заявка отправлена.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка отправки.');
            }
        }

        return $this->render('subscribe', ['model' => $model]);
    }

}
