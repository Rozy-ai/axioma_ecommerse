<?php

use yii\bootstrap\Html;
?>

<div class="row">
    <div class="col-xs-1">
        <?= $model->order ?>
    </div>
    <div class="col-xs-1">
        <?= Html::img($model->product->image, ['class' => 'img img-responsive']) ?>
    </div>
    <div class="col-xs-3">
        <?= $model->product->header ?>
    </div>
    <div class="col-xs-3">
        <?= Yii::$app->formatter->asCurrency($model->price) ?>
    </div>
    <div class="col-xs-3">
        <?= Html::a('Удалить', ['delete-flyer-good', 'id' => $model->id]) ?>
    </div>
</div>