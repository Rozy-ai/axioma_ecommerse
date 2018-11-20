<?php

use yii\bootstrap\Html;
?>

<div class="row">

    <div class="col-xs-6">

        <?= Html::img($model->image, ['class' => 'img img-responsive']) ?>

    </div>

    <div class="col-xs-6">
        <?= $model->header ?>
    </div>

</div>