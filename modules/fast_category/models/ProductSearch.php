<?php

namespace app\modules\fast_category\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ProductSearch extends Model {

    public $category;
    public $is_akust;
    public $is_radio;
    public $is_ip;
    public $is_tvi;
    public $search;

    const _SEARCH = [
        'is_popular' => 'Сначала популярные',
        'is_new' => 'Сначала новинки',
//        'is_popular' => 'Сначала популярные',
    ];

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['category', 'is_akust', 'is_radio', 'search', 'is_ip', 'is_tvi'], 'safe'],
        ];
    }

    public function attributeLabels() {
        return [
            'is_akust' => 'Акустомагнитные системы',
            'is_radio' => 'Радиочастотные системы',
            'is_ip' => 'IP',
            'is_tvi' => 'HD-TVI',
        ];
    }

}
