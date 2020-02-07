<?php

namespace app\modules\cart\models;

use Yii;
use app\modules\products\models\Product;

class Cart extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['session', 'product_id', 'count'], 'required'],
            [['product_id', 'count'], 'integer'],
            [['session'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'session' => 'Session',
            'product_id' => 'Product ID',
            'count' => 'Count',
        ];
    }

    public static function _Products() {

        $session = Yii::$app->session;

        $model = [];
        $counts = [];

        if (isset($session['cart'])) {

            $data = $session['cart'];

//            Yii::error($data);

            foreach ($data as $k => $item):
                $model[] = Product::findOne($k);
                $counts[] = $item;
            endforeach;
        }

        return ['models' => $model, 'counts' => $counts];
    }

}
