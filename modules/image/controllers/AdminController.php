<?php

namespace app\modules\image\controllers;

use Yii;
use yii\helpers\Html;
use app\modules\image\models\Image;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;

class AdminController extends \app\controllers\AdminController {

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'objectimage-upload' => [
                'class' => FileAPIUpload::className(),
                'path' => '@webroot/image/catalog/'
            ]
        ];
    }

    public function actionAddImage() {

        $model = new Image();

        if (Yii::$app->request->isAjax && $post = Yii::$app->request->post()) {

            $model->image = $post['image'];
            $model->product_id = $post['object_id'];

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

        $model = Image::findAll(['product_id' => $object_id]);

        $result = '';

        return $this->renderPartial('get_images', ['model' => $model]);
    }

    public function actionDeleteImage($id) {

        if ($id)
            Image::deleteAll(['id' => $id]);
    }

    public function actionSetMain($id) {

        $model = Image::findOne(['id' => $id]);
        $model->is_main = 1;
        return (
                $model->save() ) ? true : false;
    }

}
