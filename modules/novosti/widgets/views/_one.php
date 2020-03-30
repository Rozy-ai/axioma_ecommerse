<?php

use yii\helpers\Html;
?>
<div class="one row">

    <div class="col-xs-12">
        <p class="pull-left title-news">
            НОВОСТИ
        </p>
        <p class="pull-right date">
            <?= \Yii::$app->formatter->asDate($model->created_at, 'long') ?>
        </p>
    </div>
    <div class="img col-xs-12">
        <div class="description">
            <?= Html::a($model->header, ['/' . $model->url], ['class' => 'h4']) ?>
            <p><?= $model->anons ?></p>
        </div>
        <?= Html::a('Подробнее...', ['/' . $model->url], ['class' => 'more-link text-muted']) ?>


    </div>
</div>