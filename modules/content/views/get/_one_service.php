<?php

use yii\bootstrap\Html;
?>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 one-service">

    <div class="service-wrap wrap-<?= $model->id ?>" 
         onClick="window.location = '<?= $model->url ?>'">

        <!-- <div class="icon center-block hidden-sm hidden-md hidden-lg">
        </div> -->
        <div class="box_img_service">
            <img src="/image/service/<?= $model->id ?>.svg" alt="">
        </div>
        <div class="box_white"></div>
        <?= Html::a($model->header, $model->url, ['class' => 'title']) ?>

        <div class="content">
            <?= Html::tag('p', $model->anons, ['class' => 'anons']) ?>

            <?= Html::a('Узнать подробнее...', $model->url, ['class' => 'link-next']) ?>

        </div>
    </div>
</div>