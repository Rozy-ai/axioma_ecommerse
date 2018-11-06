<?php

use yii\helpers\Html;
?>

<div class="col-xs-12 col-sm-6 col-md-3">
    <a href="/category/<?= $model->url ?>">

        <div class="panel ">
            <div class="panel-body grid-item">
                <?= Html::img($model->img, ['class' => 'img', 'height' => 160]) ?>

            </div>
            <div class="panel-footer">
                <?= Html::tag('p', $model->header, ['class' => 'link']) ?>
            </div>
        </div>


    </a>
</div>