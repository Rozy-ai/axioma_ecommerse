<?php

use yii\helpers\Html;
?>

<div class="col-xs-12">
    <p class="h3"><?= $model->header ?></p>
    <p>
        <?= $model->content_info ?>
    </p>

    <?= Html::a('Подробнее', ['/catalog/default/get', 'uri' => $model->url]); ?>
</div>