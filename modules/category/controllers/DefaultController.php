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

    const PAGE_SIZE = 6;

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

        $search = new \app\modules\category\models\ProductSearch();
        $search->view = 'list';
        $search->page_size = self::PAGE_SIZE;

        $search->load(Yii::$app->request->get());

        Yii::$app->view->title = $category->title ? $category->title : $category->header;

        if ($category->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $category->description]);

        if ($category->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $category->keywords]);

        if ($parent)
            $parent = Category::getByUri($parent);


        $childs = Category::find()
                ->where(['parent_id' => $category->id])
//                ->where($where)
//                ->andWhere($andwhere)
                ->all();

//        $products = $category->getProducts();
//        print_r($products);
//        $sort = new \yii\data\Sort([
//            'attributes' => [
//                'price' => [
//                    'asc' => ['price' => SORT_ASC],
//                    'desc' => ['price' => SORT_DESC],
//                    'default' => SORT_DESC,
//                    'label' => 'Цена',
//                ],
//                'new' => [
//                    'asc' => ['created_at' => SORT_ASC],
//                    'desc' => ['created_at' => SORT_DESC],
//                    'default' => SORT_DESC,
//                    'label' => 'Новинки',
//                ],
//                'hit' => [
//                    'asc' => ['created_at' => SORT_ASC],
//                    'desc' => ['created_at' => SORT_DESC],
//                    'default' => SORT_DESC,
//                    'label' => 'Хиты',
//                ],
//            ],
//        ]);

        $where = ['category_id' => $category->id, 'is_enable' => 1];

        $andwhere = [];

        if ($search->is_akust && !$search->is_radio)
            $andwhere['type'] = 1;

        if (!$search->is_akust && $search->is_radio)
            $andwhere['type'] = 2;

        if ($search->is_akust && $search->is_radio)
            $andwhere['type'] = [1, 2];


        $query = \app\modules\catalog\models\Catalog::find()
                ->where($where)
                ->orWhere(['like', 'cats', "%{$category->id}%", false])
                ->andWhere($andwhere)
//                        ->orWhere(['category_id' => $this->childsId, 'is_enable' => 1])
//                ->orderBy($sort->orders)
        ;

        // add conditions that should always apply here

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->pagination->pageSize = $search->page_size;


        return $this->render('get', [
                    'parent' => $parent,
                    'category' => $category,
                    'childs' => $childs,
//                    'sort' => $sort,
//                    'products' => $products,
                    'dataProvider' => $dataProvider,
                    'search' => $search,
        ]);
    }

}
