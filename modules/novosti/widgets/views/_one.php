<?php

use yii\helpers\Html;
use Yii;
?>
<div class="one row">
    <div class="col-xs-12 date"><?= Yii::$app->formatter->asDate($model->news_date, 'long') ?></div>

    <div class="img col-xs-12 col-sm-5">
        <?= Html::img('/' . $model->image, ['class' => 'img img-responsive img-rounded']) ?>
    </div>
    <div class="img col-xs-12 col-sm-7">
        <div class="title">
            <?= Html::a($model->h1, ['/' . $model->url], ['class' => 'h4']) ?>
        </div>
        <div class="content"><?= $model->anons ?></div>
    </div>
</div>