<?php

namespace app\modules\cart\models;

use Yii;
use app\modules\products\models\Product;

class Favorite extends \yii\db\ActiveRecord {

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
            [['session', 'product_id'], 'required'],
            [['product_id'], 'integer'],
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
        ];
    }

    public static function _Products() {

        $session = Yii::$app->session;

        $model = [];

        if (isset($session['favorite'])) {

            $data = array_unique($session['favorite']);

//            Yii::error($data);

            foreach ($data as $k => $item):
                $model[] = Product::findOne($item);
            endforeach;
        }

        return ['models' => $model];
    }

}
