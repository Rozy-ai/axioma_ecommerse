<?php

use yii\helpers\Html;
?>

<div class="row catalog-item">

    <div class="col-sm-2 hidden-xs">
        <?=
        Html::a(Html::img($model->Img, ['class' => 'img pull-right img-rounded img-responsive center-block',
                    'width' => 160
                ]), ['/category/' . $model->url], ['class' => 'link'])
        ?>

    </div>
    <div class="col-xs-12 col-sm-8">
        <p class="h3">
            <?= Html::a($model->header, ['/category/' . $model->url], ['class' => 'link']) ?>
        </p>
        <?=
        Html::a(Html::img($model->Img, ['class' => 'img img-rounded img-responsive  center-block'
                ]), ['/category/' . $model->url], ['class' => 'link hidden-sm hidden-md hidden-lg'])
        ?>

        <p>
            <?= $model->preview ?>
        </p>

    </div>
</div>

