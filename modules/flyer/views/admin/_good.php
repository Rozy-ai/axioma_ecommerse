<?php

use yii\bootstrap\Html;
?>

<div class="row">
    <div class="col-xs-1">
        <?= $model->order ?>
    </div>
    <div class="col-xs-1">
        <?= Html::img($model->img, ['class' => 'img img-responsive']) ?>
    </div>
    <div class="col-xs-3">
        <?= $model->name ?>
    </div>
    <div class="col-xs-1">
        <?= Yii::$app->formatter->asCurrency($model->price) ?>
    </div>
    <div class="col-xs-1">
        <?= Yii::$app->formatter->asCurrency($model->price_new) ?>
    </div>
    <div class="col-xs-1">
        <?= Html::a('<span class="glyphicon glyphicon-pencil text-info"></span>', ['edit-flyer-good', 'id' => $model->id]) ?>
    </div>
    <div class="col-xs-1">
        <?= Html::a('<span class="glyphicon glyphicon-trash text-danger"></span>', ['delete-flyer-good', 'id' => $model->id]) ?>
    </div>
</div>