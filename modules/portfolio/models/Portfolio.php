<?php

namespace app\modules\portfolio\models;

use Yii;

class Portfolio extends \app\models\Portfolio {

    public function getMainImage() {
        foreach ($this->portfolioImages as $image):

            return ($image->is_main) ? $image->image : false;

        endforeach;
    }

}
