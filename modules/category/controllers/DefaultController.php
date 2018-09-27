<?php

namespace app\modules\category\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use app\modules\category\models\Category;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    public function actionIndex() {

        return $this->render('index', [
        ]);
    }

    public function actionGet($category, $subcategory = '') {

        $parent = $subcategory ? $category : false;

        if (isset($parent) && $parent)
            $category = $subcategory;

        $category = Category::getByUrl($category);

        if (!$category)
            throw new HttpException(404, ' Страница не найдена! ');

        Yii::$app->view->title = $category->title ? $category->title : $category->header;

        if ($category->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $category->description]);

        if ($category->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $category->keywords]);

        if ($parent)
            $parent = Category::getByUri($parent);

        $childs = Category::find()->where(['parent_id' => $category->id])->all();

        $products = $category->getProducts();


        return $this->render('get', [
                    'parent' => $parent,
                    'category' => $category,
                    'childs' => $childs,
                    'products' => $products,
        ]);
    }

}
