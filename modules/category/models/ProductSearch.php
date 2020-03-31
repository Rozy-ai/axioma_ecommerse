<?php

namespace app\modules\category\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ProductSearch extends Model {

    public $category;
    public $is_akust;
    public $is_radio;
    public $search;
    public $page_size;
    public $view;

    const _SEARCH = [
        'is_popular' => 'Сначала популярные',
        'is_new' => 'Сначала новинки',
//        'is_popular' => 'Сначала популярные',
    ];
    const _SHOW = [
        6 => 'Показывать 6 товаров',
        12 => 'Показывать 12 товаров',
        18 => 'Показывать 18 товаров',
        24 => 'Показывать 24 товаров',
    ];

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['category', 'is_akust', 'is_radio', 'search', 'page_size', 'view'], 'safe'],
        ];
    }

    public function attributeLabels() {
        return [
            'is_akust' => 'Акустомагнитные системы',
            'is_radio' => 'Радиочастотные системы',
        ];
    }

}
