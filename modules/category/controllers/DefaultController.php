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

        $category = Category::getByUri($category);

        if (!$category)
            throw new HttpException(404, ' Страница не найдена! ');

        Yii::$app->view->title = $category->seo_title ? $category->seo_title : $category->title;

        if ($category->seo_description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $category->seo_description]);

        if ($category->seo_keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $category->seo_keywords]);

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
