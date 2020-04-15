<?php

use yii\helpers\Html;
?>

<div class="col-xs-12 col-sm-6 col-md-3 item-wrap">

    <div class="panel panel-click" attr-link="/fast-cat/<?= $model->url ?>">
        <div class="panel-heading grid-item"
             style="background: url(<?= $model->getImg(1200) ?>) top center no-repeat">
        </div>

        <div class="panel-body text-center">
            <?= Html::tag('p', $model->header, ['class' => 'link']) ?>
        </div>
        <div class="panel-footer">


            <?=
            Html::a('В каталог', ['/fast-cat/' . $model->url]
                    , ['class' => 'btn btn-primary btn-hover center-block'])
            ?>
        </div>
    </div>


</div>