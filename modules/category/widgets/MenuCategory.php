<?php

namespace app\modules\category\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\category\models\Category;
use yii\helpers\Html;

class MenuCategory extends Widget {

    public $active_id, $menu, $all;
    private $_all;

    public function init() {

        parent::init();
    }

    public function run() {

//        $model = Category::find()
//                ->where(['is_enable' => 1, 'parent_id' => 0])
//                ->orderBy(['ord' => SORT_ASC])
////                ->andWhere(['not', ['parent_id' => NULL]])
////                ->with('childs')
//                ->all();
//
//        $_menu = Category::find()->where(['is_enable' => 1])->orderBy(['ord' => SORT_DESC])->all();
//
//        foreach ($model as $item):
//            $tree .= '<li class="dropdown category-link"><div class="row">'
//                    . '<div class="col-xs-3">' .
//                    Html::img($item->Ico, ['class' => 'img img-responsive']) .
//                    '</div>'
//                    . '<div class="col-xs-9">' .
//                    Html::a($item->header, ['/category/' . $item->url]
//                            , []) . ''
//                    . '</div>'
//                    . '</div>'
//                    . '</li>';
//        endforeach;
        $menu = Category::find()->where(['is_enable' => 1])->orderBy(['ord' => SORT_DESC])->all();
        $menu = $this->form_tree($menu);
//        var_dump($menu);
//        exit();
        $menu = $this->build_tree($menu, 1);
//        print_r($model);
//        echo 12;
//        $model = Category::getRootList();
//        $this->getAll(1);
//        print_r($this->_all);
//        exit();
//        $this->form_tree($this->_all);
//        $this->_menu = $this->build_tree($this->_all, 187, $this->active_id);
//        print_r($this->_all);
//        exit();

        return $this->render('menu_category', [
//                    'model' => $model,
//                    'menu' => $tree,
//            'model' => $model,
                    'menu' => $menu
        ]);
    }

    public function form_tree($mess) {
        if (!is_array($mess)) {
            return false;
        }
        $tree = [];
        foreach ($mess as $value) {
            $tree[$value['parent_id']][] = $value;
        }
        return $tree;
    }

//$parent_id - какой parentid считать корневым
//по умолчанию 0 (корень)
    public function build_tree($cats, $parent_id) {
        if (is_array($cats) && isset($cats[$parent_id])) {
            $tree = $parent_id == 1 ? '' : '<ul class="forAnimate childs" role="menu">';
            foreach ($cats[$parent_id] as $cat) {

                $active = ($this->active_id == $cat->id) ? 'active' : '';
                $is_first = ($cat->parent_id == 1) ? 'first' : '';
                $is_drop_down = $this->build_tree($cats, $cat->id) ? 'li-dropdown' : false;
                $button = $this->build_tree($cats, $cat->id) ?
                        Html::button($active ? '<i class="fas fa-minus"></i>' :
                                '<i class="fas fa-plus"></i>'
                                , ['class' => 'pull-right btn-link more']) : '';

                $tree .= '<li class="' . $active . ' ' . $is_drop_down . ' ' . $is_first . '">'
                        . Html::a($cat->header . $button, ['/category/' . $cat->url], ['title' => $cat->title]);
                $tree .= $this->build_tree($cats, $cat->id);
                $tree .= '</li>';
            }
            $tree .= $parent_id == 1 ? '' : '</ul>';
        } else {
            return false;
        }
        return $tree;
    }

    private function getAll() {

        $model = Catalog::find()->where(['parent_id' => 1, 'act' => 1])
                ->orderBy(['ord' => SORT_DESC])
                ->all();

        if ($model)
            foreach ($model as $item):
                $this->all[$item->parent_id][] = [
                    'id' => $item->id,
                    'parentid' => $item->parent_id,
                    'name' => $item->name,
                    'url' => $item->url,
                ];
                $this->getAll($item->id);
            endforeach;
    }

}
