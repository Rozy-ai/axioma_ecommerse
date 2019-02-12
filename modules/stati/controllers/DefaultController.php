<?php

namespace app\modules\stati\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use yii\web\HttpException;
use app\modules\stati\models\Stati;

class DefaultController extends Controller {

    const NAME = 'Статьи';

    public function actionIndex() {

        // Грузим все новости кто включён и ниже сегодняшней даты

        $query = Stati::find()->where(['parent_id' => Stati::PARENT_ID])
                ->orderBy(['create_time' => SORT_ASC]);
        // делаем копию выборки
        $countQuery = clone $query;
        // подключаем класс Pagination, выводим по 10 пунктов на страницу
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        // приводим параметры в ссылке к ЧПУ
        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        // Заголовок с пагинацией
        $request = Yii::$app->request->get();
        Yii::$app->view->title = self::NAME . ',  ' . ((isset($request['page'])) ? ' Страница - ' . $request['page'] . ' ,' : '') .
                Yii::$app->session->get('current_city') . ', ' . Yii::$app->name;

//         Передаем данные в представление
        return $this->render('index', [
                    'models' => $models,
                    'pages' => $pages,
        ]);
    }

    public function actionGet($url) {

        $url = 'stati/' . $url;

        $model = Stati::find()->where(
                        'BINARY [[url]]=:url', ['url' => $url]
                )->
                andWhere(['act' => 1])
                ->one();

        if (!$model)
            throw new HttpException(404, 'Page not Found');

        $model->replaceCodes();

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
