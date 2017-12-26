<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SystemController extends Controller {

    public $category_arr;

    public function actionGoodsContent() {
//        echo 1;

        $old_goods = \app\modules\catalog\models\Catalog::find()->all();

        foreach ($old_goods as $item):
            $model = \app\modules\options\models\TblCoreOld::find()->where(['parent_id' => $item->id])->all();

            $a = false;

            foreach ($model as $_item):
                if ($_item->model == 'ProductionTab') {
                    $item->content2 .= $_item->content;
                    $a = true;
                }
            endforeach;

            if ($a)
                $item->save();
//            echo $item->content2;
//            print_r($item->errors);

        endforeach;
    }

    public function actionCollectGoods() {

        $model = \app\modules\category\models\Category::find()->all();

        foreach ($model as $item):

            echo $item->title . ' ___ <br/>';

            $childs = \app\modules\menu\models\Core::find()->where(['parent_id' => $item->id])->all();

            foreach ($childs as $child):
                echo $child->title . ' -- ';
            endforeach;

        endforeach;


        echo 1;
    }

    public function actionCreateCategory() {

        $model = $this->getItems();

        foreach ($model as $item):

            if (!$item->getParentName()) {
//                echo $item->name.'<br/>';
                $cat = new \app\modules\category\models\Category();

                $cat->id = $item->id;
                $cat->parent_id = $item->parent_id;
                $cat->title = $item->h1 ? $item->h1 : $item->name;
                $cat->uri = $item->url;
                $cat->preview = $item->anons;
                $cat->content = $item->content . $item->content2;
                $cat->image = $item->image ? strval('/' . $item->image) : '';
                $cat->ord = $item->ord;
                $cat->seo_title = $item->title;
                $cat->seo_description = $item->description;
                $cat->seo_keywords = $item->keywords;
                $cat->created_at = strtotime($item->create_time);
                $cat->show = 1;

                echo $cat->image;

                $cat->save();

                print_r($cat->errors);
            }


        endforeach;
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

//$parent_id - какой parentid считать корневым
//по умолчанию 0 (корень)
    public function build_tree($cats, $parent_id) {
        if (is_array($cats) && isset($cats[$parent_id])) {
            $tree = '<ul>';
            foreach ($cats[$parent_id] as $cat) {

//                print_r($cat);

                if (!$cat->getParentName()) {
                    $tree .= '<li>' . $cat['name'] . ' id-' . $cat['id'];
                    $tree .= $this->build_tree($cats, $cat['id']);
                    $tree .= '</li>';
                }
            }
            $tree .= '</ul>';
        } else {
            return false;
        }
        return $tree;
    }

    public function actionIndex() {

        $this->category_arr = $this->getItems();

        echo count($this->category_arr);

        $tree = $this->form_tree($this->category_arr);
//        var_dump($tree); exit();
        echo $this->build_tree($tree, 1);

//        print_r($category_arr);
//        $this->buildTree($this->category_arr, $parent_id);
//        foreach ($model as $item):
//
//            echo $item->name . '<br/>';
//            $_model = $this->getItems($item->id);
//
//            foreach ($_model as $_item):
//                echo '__ ' . $_item->name . '<br/>';
//
//                $__model = $this->getItems($_item->id);
//
//                foreach ($__model as $__item):
//                    echo '__ __ ' . $__item->name . '<br/>';
//                endforeach;
//
//
//            endforeach;
//
//
//        endforeach;
    }

    public function getItems() {

        return \app\modules\options\models\TblCoreOld::find()
                        ->where(['model' => 'ProductionCategory', 'act' => 1])
//                        ->andWhere(['parent_id' => $id])
                        ->all();
    }

//
//    public function actionIndex() {
//
//
//    }
}
