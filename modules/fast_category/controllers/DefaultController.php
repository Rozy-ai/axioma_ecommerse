<?php

namespace app\modules\fast_category\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use app\modules\fast_category\models\FastCategory;

/**
 * AdminController implements the CRUD actions for Theme model.
 */
class DefaultController extends Controller {

    const PAGE_SIZE = 100;

    public function actionGet($category, $subcategory = '') {

        $parent = $subcategory ? $category : false;

        if (isset($parent) && $parent)
            $category = $subcategory;

        $category = FastCategory::getByUrl($category);

        if (!$category)
            throw new HttpException(404, ' Страница не найдена! ');

        $search = new \app\modules\fast_category\models\ProductSearch();

        $search->load(Yii::$app->request->post());

        Yii::$app->view->title = $category->title ? $category->title : $category->header;

        if ($category->description)
            \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $category->description]);

        if ($category->keywords)
            \Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $category->keywords]);


        $where = ['fastcat_id' => $category->id, 'is_enable' => 1];

        $andwhere = [];

        if ($search->is_akust)
            $andwhere['is_akustika'] = 1;

        if ($search->is_radio)
            $andwhere['is_radio'] = 1;



        $query = \app\modules\catalog\models\Catalog::find()
                ->where($where)
                ->andWhere($andwhere)
//                        ->orWhere(['category_id' => $this->childsId, 'is_enable' => 1])
//                ->orderBy($sort->orders)
                ->orderBy('ord DESC')
        ;

        // add conditions that should always apply here

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->pagination->pageSize = self::PAGE_SIZE;


        return $this->render('get', [
                    'parent' => $parent,
                    'category' => $category,
//                    'sort' => $sort,
//                    'products' => $products,
                    'dataProvider' => $dataProvider,
                    'search' => $search,
        ]);
    }

}
