<?php

use yii\helpers\Html;
?>

<div class="category-widget">



    <div class="row">
        <?php
        foreach ($model as $item) {
            echo $this->render('_one', ['model' => $item]);
        }
        ?>

    </div>
</div>

