<?php

use yii\bootstrap\Html;
?>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 one-service">

    <div class="service-wrap wrap-<?= $model->id ?>" 
         onClick="window.location = '<?= $model->url ?>'">

        <?= Html::a($model->header, $model->url, ['class' => 'title']) ?>

        <div class="content">
            <?= Html::tag('p', $model->anons, ['class' => 'anons']) ?>

            <?= Html::a('Подробнее', $model->url, ['class' => 'link-next']) ?>

        </div>
    </div>
</div>