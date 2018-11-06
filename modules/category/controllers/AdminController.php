<?php

namespace app\modules\category\controllers;

use Yii;
use app\modules\catalog\models\Catalog;
use app\modules\category\models\Category;
use app\modules\category\controllers\SearchCategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use vova07\fileapi\actions\UploadAction as FileAPIUpload;

/**
 * AdminController implements the CRUD actions for Category model.
 */
class AdminController extends \app\controllers\AdminController {

    public function actions() {
        return [
            'upload-image' => [
                'class' => FileAPIUpload::className(),
                'path' => '@webroot/image/category'
            ],
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SearchCategory();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = \app\models\Category::find()->orderBy(['ord' => SORT_DESC])->all();
//        $cats = $this->createTree();
//        print_r($cats);
        $tree = $this->form_tree($model);
//        var_dump($tree); exit();

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'cats' => $this->build_tree($tree, 187),
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAjaxUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function createTree() {

        $result = [];

        $model = \app\models\Category::find()->with('childs')->where(['parent_id' => 1])->all();

//        var_dump($model); exit();

        foreach ($model as $k => $item):

            $childs = [];

            if ($item->childs)
                foreach ($item->childs as $child)
                    $childs[] = ['title' => $child->title, 'key' => $child->id, 'children' => [0 => ['title' => 'test', 'key' => 'xxx']]];

            $result[$k] = ['title' => $item->title, 'key' => $item->id];

            if ($childs)
                $result[$k]['children'] = $childs;

        endforeach;

        return $result;
    }

    public function build_tree($cats, $parent_id) {

        $tree = [];

        if (is_array($cats) && isset($cats[$parent_id])) {
//            $tree = '<ul>';
            foreach ($cats[$parent_id] as $cat) {

                $tree[] = [
                    'title' => $cat->title,
                    'key' => $cat->id,
                    'children' => $this->build_tree($cats, $cat['id']),
                ];

//                print_r($cat);
//                if (!$cat->getParentName()) {
//                    $tree .= '<li>' . $cat['name'] . ' id-' . $cat['id'];
//                    $tree .= $this->build_tree($cats, $cat['id']);
//                    $tree .= '</li>';
//                }
            }
//            $tree .= '</ul>';
        } else {
            return false;
        }
        return $tree;
    }

    public function form_tree($mess) {
        if (!is_array($mess)) {
            return false;
        }
        $tree = array();
        foreach ($mess as $value) {
            $tree[$value['parent_id']][] = $value;
        }
        return $tree;
    }

    public function actionUpdateCat() {

//        $model = \app\models\Core::find()->where(['parent_id' => 187])->all();
//
//        foreach ($model as $item):
//
//
//
//        endforeach;

        $model = \app\models\Category::find()->all();

        foreach ($model as $item):

            $prod = \app\models\Core::find()->where(['url' => $item->uri])->one();

            if ($prod) {

                $cats = \app\models\Core::find()->where(['parent_id' => $prod->id])->all();

                foreach ($cats as $cat):
                    echo $cat->id . PHP_EOL;

//                    $new_cat = new \app\models\Category;

                endforeach;
            }


        endforeach;
    }

    public function actionRefreshCat() {

        $model = \app\models\Category::find()->all();

        foreach ($model as $item):

            $prod = \app\models\Core::find()->where(['url' => $item->uri])->one();

            if ($prod) {

                $cats = \app\models\Core::find()->where(['parent_id' => $prod->id])->all();

                $products = \app\models\Core::find()
                                ->where(['parent_id' => $prod->id])->all();

                foreach ($cats as $cat):
                    echo $cat->id . PHP_EOL;

//                    $new_cat = new \app\models\Category;

                    \app\models\Core::deleteAll($cat->id);

                endforeach;

                \app\models\Core::deleteAll($prod->id);
            }

        endforeach;
    }

    public function actionRefresh() {

        $model = \app\models\Category::find()->all();

        foreach ($model as $item):

            $oldcat = \app\models\Core::find()->where(['url' => $item->uri])->one();

            $products = \app\models\Core::find()->where(['parent_id' => $oldcat->id])->all();

            foreach ($products as $product):

                $product->cat_main = $item->id;
                $product->save();

            endforeach;

        endforeach;

//        $model = \app\models\Core::find()->all();
//
//        foreach ($model as $item):
//            $item->cat_main = '';
//            $item->save();
//        endforeach;
//        $model = \app\models\Category::find()->all();
//
//        foreach ($model as $item):
//
//            \app\models\Core::deleteAll(
//                    [
//                        'url' => $item->uri,
//            ]);
//
//        endforeach;
//        $model = \app\models\Core::find()->all();
//
//        foreach ($model as $item):
//
//            $item->cat_main = $item->parent_id;
//            $item->save();
//            print_r($item->errors);
//
//        endforeach;
    }

    public function actionEnableAllCat() {
        $model = \app\models\Category::find()->all();

        foreach ($model as $item):

            $item->show = 1;
            $item->image = '/' . $item->image;
            $item->save();

        endforeach;
    }

}
