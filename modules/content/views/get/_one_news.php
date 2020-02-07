<?php

use yii\helpers\Html;
?>
<div class="one row">

    <div class="img col-xs-12 col-sm-3">
        <?= Html::img($model->Image, ['class' => 'img img-responsive img-thumbnail', 'alt' => $model->header]) ?>
    </div>
    <div class="img col-xs-12 col-sm-9">
        <i class="far fa-calendar-alt"></i>
        <?= Yii::$app->formatter->asDate($model->created_at, 'long') ?>
        <div class="title">
            <?= Html::a($model->header, ['/' . $model->url], ['class' => 'h2']) ?>
        </div>
        <div class="content"><?= $model->anons ?></div>
    </div>
</div>
