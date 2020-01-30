<?php

use yii\helpers\Html;
?>

<div class="col-xs-12">
    <p class="h3"><?= $model->header ?></p>
    <p>
        <?= $model->preview ?>
    </p>

    <?= Html::a('Подробнее', ['/category/' . $model->url]); ?>
    <br/>
    <br/>
</div>