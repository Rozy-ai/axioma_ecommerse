<?php

use yii\helpers\Html;

$model->id;
?>
<div class="row">
    <div class="col-xs-12 col-sm-2">
        <?= Html::img($model->image, ['class' => 'img img-responsive']) ?>
    </div>
    <div class="col-xs-12 col-sm-6">
        <?= Html::a($model->name, ['/' . $model->url]) ?>
    </div>
</div>