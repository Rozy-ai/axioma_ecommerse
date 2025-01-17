<?php

namespace app\modules\content\controllers;

use Yii;
use app\modules\content\models\Content;
use app\modules\content\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;


/**
 * NewsController implements the CRUD actions for Content model.
 */
class NewsController extends ContentController {

    const TYPE = 3;

    public function actions() {
        return [
            'upload-image' => [
                'class' => FileAPIUpload::className(),
                'path' => '@webroot/image/content',
//                'uploadOnlyImage' => false,
            ],
        ];
    }

    /**
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Content model.
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
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Content();
        $model->type_id = self::TYPE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

//            Yii::error(Yii::$app->request->post()['Content']['image']);
            Yii::error($model->errors);
//            print_r($model);
//            return $this->redirect(['index']);
//            $model->image = Yii::$app->request->post()['Content']['image'];
//            $model->image = 'test';
            $model->save();
        }
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//
////            Yii::error(Yii::$app->request->post()['Content']['image']);
////            Yii::error($model->errors);
////            print_r($model);
////            return $this->redirect(['index']);
//
//            $model->image = Yii::$app->request->post()['Content']['image'];
//            $model->image = 'test';
//            $model->save();
//        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Content model.
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
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
