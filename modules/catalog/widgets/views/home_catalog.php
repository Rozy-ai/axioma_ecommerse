<?php

use yii\helpers\Html;
?>

<div class="category-widget">

    <h1>Антикражные системы для магазинов</h1>

    <div class="row">
        <?php
        foreach ($model as $item) {
            echo $this->render('_one', ['model' => $item]);
        }
        ?>

    </div>
</div>

