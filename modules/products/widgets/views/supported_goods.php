<?php

foreach ($models as $model):

    echo $this->render('@app/modules/products/views/default/product-cart', ['model' => $model]);

endforeach;
?>