<?php

use yii\helpers\Html;
?>

<div class="col-xs-12 col-sm-6 col-md-3">

    <div class="panel panel-click" attr-link="/category/<?= $model->url ?>">
        <div class="panel-heading">
            <div class="cat-price pull-right">

                <div class="price">
                    <?=
                    $model->price ?
                            'от ' . \Yii::$app->formatter->asCurrency($model->price) : ''
                    ?>

                </div>
            </div>
        </div>
        <div class="panel-body grid-item"
             style="background: url(<?= $model->getImg(1200) ?>) top center no-repeat">
            <div class="btn-wrap text-center">
                <?=
                Html::a('В каталог', ['/category/' . $model->url]
                        , ['class' => 'btn btn-primary btn-hover center-block'])
                ?>
            </div>
        </div>
        <div class="panel-footer">
            <?= Html::tag('p', $model->header, ['class' => 'link']) ?>
        </div>
    </div>


</div>