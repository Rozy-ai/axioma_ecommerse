<?php

foreach ($model->supportedGoods as $good->parentProduct):

    $product = \app\modules\products\models\Product::findOne($good->parentProduct->id);
    echo $this->render('@app/modules/products/views/default/product-cart', ['model' => $product]);

endforeach;
?>