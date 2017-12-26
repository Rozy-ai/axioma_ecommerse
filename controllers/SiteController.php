<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Core;
use app\models\Category;
use app\modules\options\models\Options;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => '/uploads/', // Directory URL address, where files are stored.
                'path' => '@webroot/uploads/' // Or absolute path to directory where files are stored.
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {

        Yii::$app->view->title = Options::getVal('main_seo_title');

        Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => Options::getVal('main_seo_title')]);

        Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => Options::getVal('main_seo_title')]);

        return $this->render('index');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionTest() {
//        return $this->render('index');
//        $model = \app\models\Core::find()->all();

        $model = \app\modules\menu\models\Core::find()->where(['parent_id' => 187, 'act' => 1])
                ->andWhere(['not', ['model' => 'ProductionTab']])
                ->orderBy(['ord' => SORT_DESC])
                ->all();

        foreach ($model as &$item):

//            if ($item->model == 'ProductionCategory') {
//                echo $item->name .' '.$item->url. "</br>";
            $cat = new Category;
            $cat->title = $item->h1 ? $item->h1 : $item->name;
            $cat->seo_title = $item->title;
            $cat->seo_description = $item->description;
            $cat->seo_keywords = $item->keywords;
            $cat->uri = $item->url;
            $cat->content = $item->content;
            $cat->preview = $item->anons;
            $cat->ord = $item->ord;
            $cat->image = $item->image;
            $cat->created_at = time();
            $cat->save();
//            }



        endforeach;

//        echo 1;
    }

//    public function actionTest() {
////        return $this->render('index');
//        $model = \app\models\Core::find()->all();
//
//        foreach ($model as &$item):
//
//            if ($item->model == 'ProductionTab') {
//
//                $parent = \app\models\Core::findOne($item->parent_id);
//                if ($parent) {
//
//                    $parent->content .= "<h2>{$item->name}</h2>" . $item->content;
//
//                    if ($parent->save(false)) {
////                        $item->delete();
//                        \app\models\Core::deleteAll(['id' => $item->id]);
//                        echo 'done';
//                    }
//                    else
//                        print_r($parent->errors);
//
//                    echo $parent->id.PHP_EOL;
//                }
//            }
////                echo $item->parent_id;
//
//
//        endforeach;
//
////        echo 1;
//    }
}
