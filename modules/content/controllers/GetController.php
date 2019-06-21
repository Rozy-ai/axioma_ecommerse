<?php

namespace app\modules\content\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use yii\data\Pagination;
use app\modules\uslugi\models\Uslugi;
use app\modules\content\models\Content;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class GetController extends Controller {

    public function actionNews() {

        // Грузим все новости кто включён и ниже сегодняшней даты

        $request = Yii::$app->request->get();

        $query = \app\modules\content\models\Content::find()
                ->orderBy(['created_at' => SORT_DESC])
                ->where(['type_id' => Content::TYPE['Новости'], 'is_enable' => 1]);
        // делаем копию выборки
        $countQuery = clone $query;
        // подключаем класс Pagination, выводим по 10 пунктов на страницу
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        // приводим параметры в ссылке к ЧПУ

        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => 'Новости компании Аксиома: новые точки обслуживания, офисы, личные достижения сотрудников компании']);


        return $this->render('news_index', [
                    'models' => $models,
                    'pages' => $pages,
                    'request' => $request,
        ]);
    }

    public function actionArticles() {

        // Грузим все новости кто включён и ниже сегодняшней даты

        $query = \app\modules\content\models\Content::find()
                ->orderBy(['created_at' =>SORT_DESC])
                ->where(['type_id' => Content::TYPE['Статьи'], 'is_enable' => 1]);
        // делаем копию выборки
        $countQuery = clone $query;
        // подключаем класс Pagination, выводим по 10 пунктов на страницу
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        // приводим параметры в ссылке к ЧПУ

        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => 'Статьи компании Аксиома: актуальные новости и статьи про антикражное оборудование']);


        return $this->render('articles_index', [
                    'models' => $models,
                    'pages' => $pages,
        ]);
    }

    public function actionServices() {


        $model = Content::findOne([
                    'is_enable' => 1,
                    'type_id' => Content::TYPE['Услуги'],
                    'is_main' => 1,
        ]);

        if (!$model)
            throw new HttpException(404, 'Page not Found');

        Yii::$app->view->title = $model->title ? $model->title : $model->header;

        if ($model->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->description]);

        if ($model->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords]);


        return $this->render('services', [
                    'model' => $model,
        ]);
    }

    public function actionOne($url) {

//        Yii::$app->session->setFlash('success', 'Заявка отправлена.');

        $model = Content::find()->where(
                        ['url' => $url]
                )->
                andWhere(['is_enable' => 1])
                ->one();

        if (!$model)
            throw new HttpException(404, 'Page not Found');

        Yii::$app->view->title = $model->title ? $model->title : $model->header;

        if ($model->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->description]);

        if ($model->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords]);


        $view = '';

        if ($model->type_id == Content::TYPE['Услуги']) {
            $view = 'service';
        } elseif ($model->type_id == Content::TYPE['Новости']) {
            $view = 'news';
        } elseif ($model->type_id == Content::TYPE['Статьи']) {
            $view = 'article';
        } else
            $view = 'page';


        return $this->render($view, [
                    'model' => $model,
        ]);
    }

}
