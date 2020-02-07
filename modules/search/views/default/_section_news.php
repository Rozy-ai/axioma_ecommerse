<?php

use yii\helpers\Html;
?>

<div class="col-xs-12">
    <p class="h3"><?= $model->header ?></p>
    <p>
        <?= $model->anons ?>
    </p>

    <?= Html::a('Подробнее', '/' . $model->url); ?>
    <br/>
    <br/>
</div>