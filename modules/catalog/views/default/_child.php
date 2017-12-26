<?php

use yii\helpers\Html;
?>

<div class="row">
    <div class="col-xs-6">
        <div class="col-xs-12 col-sm-4">
            <?= Html::img('/' . $model->image, ['class' => 'img img-responsive']) ?>
        </div>
        <div class="col-xs-12 col-sm-6">
            <?= Html::a($model->name, ['/catalog/' . $model->url]) ?>
        </div>
    </div>
</div>