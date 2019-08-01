<?php

use yii\bootstrap\Html;
?>

<div class="col-xs-12 col-sm-6 one-service">

    <div class="row">
        <div class="col-xs-12 col-sm-2 image-wrap">
            <?=
            $item->image ? Html::img($model->image, ['class' => 'img img-responsive', 'alt' => '']) :
                    Html::img('/image/advantages/about.svg', ['class' => 'img img-responsive', 'alt' => ''])
            ?>
        </div>
        <div class="col-xs-12 col-sm-10 content">

            <?= Html::a($model->header, $model->url, ['class' => 'title']) ?>
            <?= Html::tag('p', $model->anons, ['class' => 'anons']) ?>

            <?= Html::a('Подробнее', $model->url, ['class' => 'btn btn-primary btn-next']) ?>

        </div>
    </div>
</div>