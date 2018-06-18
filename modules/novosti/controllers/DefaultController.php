<?php

namespace app\modules\novosti\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\HttpException;
use app\modules\novosti\models\News;

class DefaultController extends Controller {

    const NAME = 'Новости';

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

        $request = Yii::$app->request->get();

//        print_r($request);
//title
        Yii::$app->view->title = self::NAME . ',  ' . ((isset($request['page'])) ? ' Страница - ' . $request['page'] . ' ,' : '') .
                Yii::$app->session->get('current_city') . ', ' . Yii::$app->name;


        return $this->render('index', [
                    'models' => $models,
                    'pages' => $pages,
        ]);
    }

    public function actionGet($url) {

        $url = 'novosti/' . $url;

        $model = News::find()->where(
                        'BINARY [[url]]=:url', ['url' => $url]
                )->
                andWhere(['act' => 1])
                ->one();

        if (!$model)
            throw new HttpException(404, 'Page not Found');

        Yii::$app->view->title = $page->title ? $page->title : $page->name;

        if ($model->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->description]);

        if ($model->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords]);

        return $this->render('get', [
                    'model' => $model,
        ]);
    }

}
