<?php

use yii\helpers\Html;
?>

<div class="col-xs-12">
    <h2><?= $model->name ?></h2>
    <p>
        <?= $model->anons ?>
    </p>

    <?= Html::a('Подробнее', ['/catalog/default/get', 'uri' => $model->url]); ?>
</div>