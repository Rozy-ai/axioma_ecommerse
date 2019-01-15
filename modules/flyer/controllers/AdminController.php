<?php

namespace app\modules\flyer\controllers;

use Yii;
use app\modules\flyer\models\Flyer;
use app\modules\flyer\models\FlyerSearch;
use app\modules\flyer\models\FlyerGoods;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\helpers\ArrayHelper;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;

/**
 * AdminController implements the CRUD actions for Flyer model.
 */
class AdminController extends \app\controllers\AdminController {

    public function actions() {
        return [
            'upload-image' => [
                'class' => FileAPIUpload::className(),
                'path' => '@webroot/image/flyer'
            ],
        ];
    }

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

        $goods = FlyerGoods::find()
                        ->where(['id' => ArrayHelper::map($goods, 'id', 'id')])
                        ->orderBy(['order' => SORT_DESC])->all();

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

    public function actionEditFlyerGood($id) {

        $model = FlyerGoods::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->flyer_id]);
        }

        return $this->render('edit_flyer_good', [
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

        $models = FlyerGoods::find()
                        ->where(['id' => ArrayHelper::map($models, 'id', 'id')])
                        ->orderBy(['order' => SORT_DESC])->all();

//        print_r($models);

        $this->layout = '@layouts/print';

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
            'content' => $this->render('print', ['flyer' => $flyer, 'models' => $models]),
            'marginTop' => '10px',
            'marginLeft' => 0,
            'marginRight' => 0,
            'marginBottom' => '30px',
            'marginHeader' => 0,
            'marginFooter' => 0,
//            'marginBottom' => 0,
            'cssFile' => Yii::getAlias('@webroot') . '/css/print.css',
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

        return $this->render('print', ['flyer' => $flyer,'models' => $models]);
    }

//    public function actionPrintTest() {
//
//        $this->layout = '@layouts/print';
//
//        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
//        $pdf = new Pdf([
//            'mode' => Pdf::MODE_UTF8, // leaner size using standard fonts
//            'content' => $this->render('test'),
////            'marginTop' => '10px',
//            'marginTop' => 0,
//            'marginLeft' => 0,
//            'marginRight' => 0,
//            'marginBottom' => 0,
//            'marginHeader' => 0,
//            'marginFooter' => 0,
////            'paddingBottom' => '30px',
////            'marginBottom' => 0,
//            'cssFile' => '/css/test.css',
////            'cssFile' => '/css/bootstrap/bootstrap.css',
////            'cssInline' => '@page {margin: 0;}',
//            'options' => [
////                'title' => 'Privacy Policy - Krajee.com',
////                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
//            ],
//            'methods' => [
////                'SetFooter' => ['|Page {PAGENO}|'],
//                'SetFooter' => '<footer style="'
//                . 'background: #000; margin:0; padding:0;'
//                . 'height: 50px;">Test</footer>',
//            ]
//        ]);
//        return $pdf->render();
//
////        return $this->render('print', ['models' => $models]);
//    }

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

    public function actionCopy($id) {
        $model = $this->findModel($id);

        unset($model->id);
        Yii::error($model);
        $model_new = new Flyer;
        $model_new->setAttributes($model->attributes, false);
        $model_new->name = 'Копия ' . $model_new->name;
        if ($model_new->save()) {

            $goods = FlyerGoods::findAll(['flyer_id' => $id]);

            foreach ($goods as $item):

                unset($item->id);

                $new_good = new FlyerGoods;
                $new_good->setAttributes($item->attributes, false);
                $new_good->flyer_id = $model_new->id;
                $new_good->save();
//                Yii::error($new_good);
//                Yii::error($new_good->errors);

            endforeach;
        }

        return $this->redirect(['index']);
    }

}
