<?php

namespace app\modules\catalog\controllers;

use Yii;
use yii\web\Controller;
use app\modules\products\models\Product as Catalog;
use yii\web\HttpException;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndex() {

        $parent = \app\modules\category\models\Category::findOne(1);

        $model = \app\modules\category\models\Category::find()
                        ->orderBy(['ord' => SORT_DESC])
                        ->where(['is_enable' => 1, 'parent_id' => 1])->all();

//        $parent->replaceCodes();

        Yii::$app->view->title = $parent->title ? $parent->title : $parent->header;

        if ($parent->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $parent->description]);

        if ($parent->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $parent->keywords]);

        return $this->render('index', ['model' => $model,
        ]);
    }

    public function actionGet($uri) {

        $page = Catalog::getByUrl($uri);

        if (!$page)
            throw new HttpException(404, 'Страница не найдена');

        $this->setViewed($page->id);

        Yii::$app->view->title = $page->title ? $page->title : $page->header;

        if ($page->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $page->description]);

        if ($page->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);

        $parent = false;

        if (isset($page->parent_id))
            $parent = Catalog::findOne($page->parent_id);

//        $page->doReplace(); // обновим контент
//        $childs = Catalog::find()->where(['parent_id' => $page->id, 'act' => 1])->all();


        return $this->render('get', [
                    'parent' => $parent,
                    'page' => $page,
//                    'childs' => $childs,
        ]);
    }

    private function setViewed($id) {

        $session = Yii::$app->session;
        $data = $session['viewed'];
        if (is_array($data))
            if (!array_search($id, $data)) {
                $data[] = $id;
                $session['viewed'] = $data;
            } else {

            } else {
            $data[] = $id;
            $session['viewed'] = $data;
        }
    }

//    public function actionTest() {
//
//        $pages = Catalog::find()->all();
//
//        foreach ($pages as $page):
//
//            $arr = explode('/', $page->url);
//
////        print_r($arr);
//
//            if (count($arr) > 1) {
//                $page->url = $arr[(count($arr) - 1)];
////                $page->save();
//                $connection = Yii::$app->db;
//                $connection->createCommand()->update('tbl_core', ['url' => $page->url], ['id' => $page->id])->execute();
////                print_r($page->errors);
//            }
//
//        endforeach;
//    }
}
