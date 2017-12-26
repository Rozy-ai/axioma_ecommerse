<?php

use yii\helpers\Html;
?>

<div class="news-widget">

    <p class="h3">Другие новости</p>

    <?php
    foreach ($model as $item) {
        echo $this->render('_one', ['model' => $item]);
    }
    ?>

</div>

