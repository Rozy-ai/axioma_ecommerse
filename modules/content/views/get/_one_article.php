<?php

use yii\helpers\Html;
?>
<div class="one row">

    <div class="img col-xs-12 col-sm-3 hidden">
        <?= Html::img($model->image, ['class' => 'img img-responsive img-rounded', 'alt' => $model->header]) ?>
    </div>
    <div class="img col-xs-12 col-sm-12">
        <div class="title">
            <?= Html::a($model->header, ['/' . $model->url], ['class' => 'h2']) ?>
        </div>
        <i class="far fa-calendar-alt"></i> <?= Yii::$app->formatter->asDate($model->created_at, 'long') ?>
        <div class="content"><?= $model->anons ?></div>
    </div>
</div>
