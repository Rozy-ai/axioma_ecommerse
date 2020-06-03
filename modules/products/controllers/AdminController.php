<?php

namespace app\modules\products\controllers;

use Yii;
use app\modules\products\models\Product;
use app\modules\products\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\products\models\ImportCSV;
use yii\web\UploadedFile;
use kartik\grid\EditableColumnAction;
use yii\helpers\ArrayHelper;

/**
 * AdminController implements the CRUD actions for Product model.
 */
class AdminController extends \app\controllers\AdminController {

    public function actions() {

        return [
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => '/uploads/', // Directory URL address, where files are stored.
                'path' => '@webroot/uploads/' // Or absolute path to directory where files are stored.
            ],
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetImagesAction',
                'url' => '/uploads/', // URL адрес папки где хранятся изображения.
                'path' => '@webroot/uploads/', // Или абсолютный путь к папке с изображениями.
//                'type' => \vova07\imperavi\actions\GetAction::TYPE_IMAGES,
            ],
            'edit-column' => [// identifier for your editable column action
                'class' => EditableColumnAction::className(), // action class name
                'modelClass' => Product::className(), // the model for the record being edited
                'outputValue' => function ($model, $attribute, $key, $index) {
                    return (int) $model->$attribute;      // return any custom output value if desired
                },
                'outputMessage' => function($model, $attribute, $key, $index) {
                    return '';                                  // any custom error to return after model save
                },
                'showModelErrors' => true, // show model validation errors after save
                'errorOptions' => ['header' => ''], // error summary HTML options
//                'postOnly' => true,
//                'ajaxOnly' => true,
            // 'findModel' => function($id, $action) {},
            // 'checkAccess' => function($action, $model) {}
            ]
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->pagination->pageSize = 100;

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            Yii::error($model->errors);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
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
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionImport() {

        $model = new ImportCSV();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {

                $file = Yii::getAlias('@webroot')
                        . '/import/' . $model->file->baseName . '.' . $model->file->extension;
                $model->file->saveAs($file);

                $row = 1;

                $data = \moonland\phpexcel\Excel::widget([
                            'mode' => 'import',
                            'fileName' => $file,
                            'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
                            'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
                            'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
                ]);

                $newData = [];


                //prepare data
                foreach ($data as $n => $item)
                    foreach ($item as $k => &$element):
                        if (Product::getNameByLabel($k))
                            $newData[$n][Product::getNameByLabel($k)] = $element;
                    endforeach;

                //save data

                foreach ($newData as $dataitem):

//                    print_r($dataitem);
//                    continue;

                    if (isset($dataitem['id'])) {
                        $_model = Product::findOne($dataitem['id']);

                        if ($_model) {

                            foreach ($dataitem as $k => $_ditem):

//                                print_r($dataitem);
                                if ($_model->hasAttribute($k))
                                    $_model->$k = $_ditem;

                                if (isset($dataitem['price']))
                                    $_model->price = (float) $dataitem['price'];



                            endforeach;
                            if ($_model->save())
                                ;
                            else
                                print_r($_model->errors);
//                        var_dump($_model);
                        } else
                            \Yii::$app->session->setFlash('error', "Не найдено");
                    }

                endforeach;

                \Yii::$app->session->setFlash('success', "Импорт завершён!");
            }
        }

        return $this->render('import', ['model' => $model]);
    }

}
