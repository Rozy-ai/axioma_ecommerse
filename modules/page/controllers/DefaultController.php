<?php

namespace app\modules\page\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use app\modules\page\models\Page;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionGet($url) {

        $page = Page::getByUrl($url);

        if (!$page)
            throw new HttpException(404, 'Страница не найдена');

        $page->replaceCodes();
        
        print_r($page);

        Yii::$app->view->title = $page->h1 ? $page->h1 : $page->name;

        if ($page->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $page->description]);

        if ($page->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);

        if (isset($page->parent_id))
            $parent = Page::findOne($page->parent_id);

        $childs = Page::find()->where(['parent_id' => $page->id, 'act' => 1])->all();


        return $this->render('get', [
                    'parent' => $parent,
                    'page' => $page,
                    'childs' => $childs,
        ]);
    }

}
