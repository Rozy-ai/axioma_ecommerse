<?php

namespace app\modules\uslugi\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\HttpException;
use app\modules\uslugi\models\Uslugi;

class DefaultController extends Controller {

    public function actionIndex() {

        // Грузим все новости кто включён и ниже сегодняшней даты

        $query = Uslugi::find()->where(['parent_id' => Uslugi::PARENT_ID])->orderBy(['create_time' => SORT_DESC]);
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

        $url = 'uslugi/' . $url;

        $model = uslugi::find()->where(['url' => $url])->one();

        if (!$model)
            throw new HttpException(404, 'Page not Found');

        Yii::$app->view->title = $model->title ? $model->title : $model->name;

        if ($model->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->description]);

        if ($model->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords]);

        return $this->render('get', [
                    'model' => $model,
        ]);
    }

}
