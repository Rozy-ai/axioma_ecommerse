<?php

use yii\helpers\Html;
?>

<div class="col-xs-12 col-sm-6 col-md-3">
    <a href="/category/<?= $model->uri ?>">

        <div class="panel ">
            <div class="panel-body grid-item">
                <?= Html::img($model->image, ['class' => 'img', 'height' => 160]) ?>

            </div>
            <div class="panel-footer">
                <?= Html::tag('p', $model->title, ['class' => 'link']) ?>
            </div>
        </div>


    </a>
</div>