<?php

namespace app\modules\category\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\category\models\Category;
use yii\helpers\Html;

class MenuCategory extends Widget {

    public $active_id;
    private $_all;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Category::find()
                ->where(['parent_id' => 187, 'show' => 1])
                ->with('childs')
                ->all();

        $_menu = Category::find()->where(['show' => 1])->orderBy(['ord' => SORT_DESC])->all();
        
        foreach ($_menu as $item)
            $item->replaceCodes();

        $menu = $this->form_tree($_menu);
//        var_dump($menu);
//        exit();
        $menu = $this->build_tree($menu, 187);

//        print_r($model);
//        echo 12;
//        $model = Category::getRootList();
//        $this->getAll(187);
//        print_r($this->_all);
//        exit();
//        $this->form_tree($this->_all);
//        $this->_menu = $this->build_tree($this->_all, 187, $this->active_id);
//        print_r($this->_all);
//        exit();

        return $this->render('menu_category', [
                    'model' => $model,
                    'menu' => $menu,
//            'model' => $model, 'menu' => $this->_menu
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
            $tree = $parent_id == 187 ? '' : '<ul class="dropdown-menu forAnimate" role="menu">';
            foreach ($cats[$parent_id] as $cat) {

                $active = ($this->active_id == $cat->id) ? '_active' : '';
                $tree .= '<li class="dropdown ' . $active . '">' . Html::a($cat['title'], ['/category/' . $cat['uri']], ['class' => 'col-xs-10']);
                $tree .= $this->build_tree($cats, $cat['id']) ?
                        Html::button('<i class="fa fa-plus-square-o" aria-hidden="true"></i>', ['class' => 'pull-right btn-link more']) : '';
                $tree .= $this->build_tree($cats, $cat['id']);
                $tree .= '</li>';
            }
            $tree .= $parent_id == 187 ? '' : '</ul>';
        } else {
            return false;
        }
        return $tree;
    }

    private function getAll() {

        $model = Catalog::find()->where(['parent_id' => 1, 'act' => 1])
                ->andWhere(['not', ['model' => 'ProductionTab']])
                ->orderBy(['ord' => SORT_DESC])
                ->all();

        if ($model)
            foreach ($model as $item):
                $this->_all[$item->parent_id][] = [
                    'id' => $item->id,
                    'parentid' => $item->parent_id,
                    'name' => $item->name,
                    'url' => $item->url,
                ];
                $this->getAll($item->id);
            endforeach;
    }

}
