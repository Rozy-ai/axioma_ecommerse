<?php

namespace app\modules\forms\widgets;

use yii\base;
use yii\base\Widget;
//use app\modules\forms\models;
use yii\helpers\Html;

class SendReview extends Widget {

    public $product_id;

    public function init() {

        parent::init();
    }

    public function run() {

        $model = new \app\modules\forms\models\SendReviewForm();

        return $this->render('send_review', [
                    'model' => $model,
                    'product_id' => $this->product_id,
        ]);
    }

}
