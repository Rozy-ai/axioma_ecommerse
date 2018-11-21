<?php

use yii\bootstrap\Html;
?>

<div class="row top-cart-item">

    <div class="col-xs-4 image-wrap">

        <?= Html::img($model->image, ['class' => 'img img-responsive img-thumbnail']) ?>


    </div>

    <div class="col-xs-8 header-wrap">
        <?= $model->header ?>
        <hr/>
        <p><?= $count ?> x <?= Yii::$app->formatter->asCurrency($model->price) ?></p>
    </div>

    <!--    <div class="col-xs-1">
    <?php Html::a('<i class="far fa-window-close"></i>', ['#'], ['class' => '']) ?>
        </div>-->

</div>