<?php

namespace app\modules\novosti\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\HttpException;
use app\modules\novosti\models\News;

class DefaultController extends Controller {

    public function actionIndex() {

        // Грузим все новости кто включён и ниже сегодняшней даты

        $query = News::find()->where(['model' => News::MODEL])->orderBy(['create_time' => SORT_DESC]);
        // делаем копию выборки
        $countQuery = clone $query;
        // подключаем класс Pagination, выводим по 10 пунктов на страницу
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        // приводим параметры в ссылке к ЧПУ
        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        // Передаем данные в представление
        return $this->render('index', [
                    'models' => $models,
                    'pages' => $pages,
        ]);
    }

    public function actionGet($url) {

        $url = 'novosti/' . $url;

        $model = News::find()->where(['url' => $url])->one();

        if (!$model)
            throw new HttpException(404, 'Page not Found');

        Yii::$app->view->title = $page->title ? $page->title : $page->h1;

        if ($model->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->description]);

        if ($model->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords]);

        return $this->render('get', [
                    'model' => $model,
        ]);
    }

}
