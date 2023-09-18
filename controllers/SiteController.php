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
use app\modules\content\models\Content;
use yii\web\HttpException;
use app\components\NumericCaptcha;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => NumericCaptcha::class,
                'fixedVerifyCode' => YII_ENV_TEST ? '42' : null,
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => '/uploads/', // Directory URL address, where files are stored.
                'path' => '@webroot/uploads/', // Or absolute path to directory where files are stored.
                'uploadOnlyImage' => false,
            ],
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetImagesAction',
                'url' => '/uploads/', // URL адрес папки где хранятся изображения.
                'path' => '@webroot/uploads/', // Или абсолютный путь к папке с изображениями.
                //                'type' => \vova07\imperavi\actions\GetAction::TYPE_IMAGES,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $utm_source = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
        $utm_medium = isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '';
        $utm_campaign = isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '';
        $utm_content = isset($_GET['utm_content']) ? $_GET['utm_content'] : '';
        $utm_term = isset($_GET['utm_term']) ? $_GET['utm_term'] : '';

        setcookie('utm_source', $utm_source, time() + 3600, '/');
        setcookie('utm_medium', $utm_medium, time() + 3600, '/');
        setcookie('utm_campaign', $utm_campaign, time() + 3600, '/');
        setcookie('utm_content', $utm_content, time() + 3600, '/');
        setcookie('utm_term', $utm_term, time() + 3600, '/');
        $model = Content::find()->where(
            ['url' => '/']
        )->andWhere(['is_enable' => 1])
            ->one();

        if (!$model)
            throw new HttpException(404, 'Page not Found');

        Yii::$app->view->title = $model->title ? $model->title : $model->header;

        if ($model->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->description]);

        if ($model->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords]);

        return $this->render('index');
    }

    //    public function actionTest() {
    //
    //        echo Yii::$app->mailer->compose('message', [
    //                    'content' => 'test',
    //                    'imageFileName' => Yii::getAlias('@app') . '/web/image/logo_email.png'
    //                ])
    ////                ->setTo('info@kognitiv.ru')
    //                ->setTo(['kpsmol@gmail.com', 'info@kognitiv.ru'])
    //                ->setFrom(['noreply@axioma.pro' => 'email-robot'])
    //                ->setSubject('test')
    ////                    ->setTextBody($this->message)
    //                ->send();
    //    }
}
