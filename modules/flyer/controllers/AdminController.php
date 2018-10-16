<?php

namespace app\modules\flyer\controllers;

use Yii;
use app\modules\flyer\models\Flyer;
use app\modules\flyer\models\FlyerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * AdminController implements the CRUD actions for Flyer model.
 */
class AdminController extends \app\controllers\AdminController {

    /**
     * Lists all Flyer models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new FlyerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Flyer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {

        $good = new \app\modules\flyer\models\FlyerGoods();

        if ($good->load(Yii::$app->request->post()) && $good->save()) {

        }

        $model = $this->findModel($id);
        $goods = $model->flyerGoods;

        return $this->render('view', [
                    'model' => $model,
                    'goods' => $goods,
        ]);
    }

    /**
     * Creates a new Flyer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Flyer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Flyer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Flyer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteFlyerGood($id) {

//        echo $id;
        $model = \app\modules\flyer\models\FlyerGoods::findOne(['id' => $id]);
//        print_r($model);
        $flyer_id = $model->flyer_id;
//        echo $flyer_id;
//        exit();
        \app\modules\flyer\models\FlyerGoods::deleteAll(['id' => $id]);

        return $this->redirect(['view', 'id' => $flyer_id]);
    }

    public function actionPrint($id) {

        $flyer = Flyer::findOne($id);

        $models = $flyer->flyerGoods;

//        print_r($models);

        $this->layout = '@layouts/print';

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->render('print', ['models' => $models]),
            'marginTop' => '10px',
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => '20px',
//            'marginBottom' => 0,
            'cssFile' => '/css/print.css',
//            'cssFile' => '/css/bootstrap/bootstrap.css',
//            'cssInline' => '@page {margin: 0;}',
            'options' => [
//                'title' => 'Privacy Policy - Krajee.com',
//                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
                'margin-footer' => 0,
            ],
            'methods' => [
//                'SetFooter' => ['|Page {PAGENO}|'],
                'SetFooter' => $this->renderPartial('_print_footer'),
            ]
        ]);
        return $pdf->render();

        return $this->render('print', ['models' => $models]);
    }

    /**
     * Finds the Flyer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Flyer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Flyer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
