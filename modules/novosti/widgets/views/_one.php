<?php

use yii\helpers\Html;
use Yii;
?>
<div class="one row">

    <div class="col-xs-12">
        <p class="pull-left h4">
            НОВОСТИ
        </p>
        <p class="pull-right h4">
            <?= Yii::$app->formatter->asDate($model->news_date, 'long') ?>
        </p>
    </div>
    <div class="img col-xs-12">
        <div class="title">
            <?= Html::a($model->h1, ['/' . $model->url], ['class' => 'h4']) ?>
            <p><?= $model->anons ?></p>
        </div>


    </div>
</div>