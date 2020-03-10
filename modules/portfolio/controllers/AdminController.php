<?php

namespace app\modules\portfolio\controllers;

use Yii;
use app\modules\portfolio\models\Portfolio;
use app\modules\portfolio\models\PortfolioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;
use app\modules\portfolio\models\PortfolioImage as Image;

/**
 * AdminController implements the CRUD actions for Portfolio model.
 */
class AdminController extends \app\controllers\AdminController {

    public function actions() {
        return [
            'objectimage-upload' => [
                'class' => FileAPIUpload::className(),
                'path' => '@webroot/image/portfolio'
            ]
        ];
    }

    public function actionAddImage() {

        $model = new Image();

        if (Yii::$app->request->isAjax && $post = Yii::$app->request->post()) {

            $model->image = $post['image'];
            $model->portfolio_id = $post['object_id'];

            if (!$model->getMain())
                $model->is_main = 1;

            if ($model->save())
                return true;
            else
                print_r($model->errors);
//            return Yii::$app->request->post();
        }

        return false;
    }

    public function actionGetImages($object_id) {

        $model = Image::findAll(['portfolio_id' => $object_id]);

        $result = '';

        return $this->renderPartial('get_images', ['model' => $model]);
    }

    public function actionDeleteImage($id) {

        if ($id)
            Image::deleteAll(['id' => $id]);
    }

    public function actionSetMain($id) {

        $model = Image::findOne(['id' => $id]);
        return (
                $model->save() ) ? true : false;
    }

    /**
     * Lists all Portfolio models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PortfolioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Portfolio model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Portfolio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Portfolio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Portfolio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Portfolio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Portfolio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Portfolio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Portfolio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
