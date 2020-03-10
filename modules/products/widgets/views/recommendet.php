<?php

use yii\helpers\Html;

foreach ($model as $item):
    echo $this->render('@app/modules/products/views/default/product-cart', ['model' => $item]);
endforeach;

