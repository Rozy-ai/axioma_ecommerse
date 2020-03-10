<?php

use yii\helpers\Html;
?>
<div class="one row">

    <div class="img col-xs-12 col-sm-3">
        <?= Html::img('/' . $model->image, ['class' => 'img img-responsive img-rounded']) ?>
    </div>
    <div class="img col-xs-12 col-sm-9">
        <div class="title">
            <?= Html::a($model->h1 ? $model->h1 : $model->name, ['/' . $model->url], ['class' => 'h2']) ?>
        </div>
        <div class="content"><?= $model->anons ?></div>
    </div>
</div>
