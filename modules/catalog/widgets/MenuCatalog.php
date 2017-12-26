<?php

namespace app\modules\catalog\widgets;

use yii\base;
use yii\base\Widget;
use app\modules\category\models\Category;
use yii\helpers\Html;

class MenuCatalog extends Widget {

    public $active_id;
    private $_menu;
    private $_all;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = Category::getRootList();

        $this->getAll(187);

//        print_r($this->_all);
//        exit();
//        $this->form_tree($this->_all);
        $this->_menu = $this->build_tree($this->_all, 187, $this->active_id);

//        print_r($this->_all);
//        exit();

        return $this->render('menu_catalog', ['model' => $model, 'menu' => $this->_menu]);
    }

    function form_tree($mess) {
        if (!is_array($mess)) {
            return false;
        }
        $tree = [];
        foreach ($mess as $value) {
            $tree[$value['parentid']][] = $value;
        }
        $this->_all = $tree;
    }

    private function build_tree($cats, $parent_id, $active_id = false) {
        if (is_array($cats) && isset($cats[$parent_id])) {
            $tree = ($parent_id == $active_id) ? '<ul class="active list-unstyled">' : '<ul class="list-unstyled">';

//            print_r($cats[$parent_id]);

            foreach ($cats[$parent_id] as $cat) {
                $tree .= '<li>' . Html::a($cat['name'], ['/catalog/' . $cat['url'], 'url' => $cat['url']]);
                $tree .= $this->build_tree($cats, $cat['id'], $active_id);
                $tree .= '</li>';
            }
            $tree .= '</ul>';
        } else {
            return false;
        }
        return $tree;
    }

    private function getAll($id) {

        $model = Catalog::find()->where(['parent_id' => $id, 'act' => 1])
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
