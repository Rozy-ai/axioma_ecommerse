<?php

namespace app\modules\fast_category\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use app\modules\products\models\Product;

/**
 * ContactForm is the model behind the contact form.
 */
class ProductSearch extends Model {

    public $category;
//    public $is_akust;
//    public $is_radio;
    public $detection_type;
    public $is_ip;
    public $is_tvi;
    public $search;
    public $enter_width;

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
            [['category',
//                'is_akust', 'is_radio', 
            'search', 'is_ip', 'is_tvi', 'enter_width', 'detection_type'], 'safe'],
        ];
    }

    public function attributeLabels() {
        return [
//            'is_akust' => 'Акустомагнитные системы',
            'is_radio' => 'Радиочастотные системы',
            'is_ip' => 'IP',
            'is_tvi' => 'HD-TVI',
            'enter_width' => 'Шиирина прохода',
            'detection_type' => 'Тип детекции',
        ];
    }

    public function collectEnterWidth($detection_type) {

        $result = [];

        if ($detection_type == 1)
            $result = ArrayHelper::map(Product::find()->select('enter_width')
                                    ->orderBy('enter_width asc')
                                    ->where(['is_enable' => 1, 'is_akustika' => 1])
                                    ->asArray()->distinct()->all(), 'enter_width', 'enter_width');
        elseif ($detection_type == 2)
            $result = ArrayHelper::map(Product::find()->select('enter_width')
                                    ->orderBy('enter_width asc')
                                    ->where(['is_enable' => 1, 'is_radio' => 1])
                                    ->asArray()->distinct()->all(), 'enter_width', 'enter_width');
        else {

            $result = ArrayHelper::map(Product::find()->select('enter_width')
                                    ->orderBy('enter_width asc')
                                    ->where(['is_enable' => 1])
                                    ->asArray()->distinct()->all(), 'enter_width', 'enter_width');
        }

//        $result = ArrayHelper::merge(['' => ' '], $result);
//        unset($result['']);
        $result[''] = 'Все';

        foreach ($result as $k => &$item):

            $item = $item . ' см';

        endforeach;
//        sort($result);

        return $result;
    }

}
