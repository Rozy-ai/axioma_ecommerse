<?php

use yii\helpers\Html;
?>

<div class="row catalog-item">

    <div class="col-xs-12 col-sm-2">
        <?=
        Html::a(
                Html::img($model->image, ['class' => 'img pull-right img-rounded', 'width' => 160]), ['/category/' . $model->uri], ['class' => 'link']
        )
        ?>
    </div>
    <div class="col-xs-12 col-sm-8">
        <p class="h3">
            <?= Html::a($model->title, ['/category/' . $model->uri], ['class' => 'link']) ?>
        </p>
        <p>
            <?= $model->preview ?>
        </p>
        <?php
        if ($model->childs)
            foreach ($model->childs as $item):
                ?>
                <?=
                Html::a($item->title, [
                    '/category/',
                    'category' => $model->uri,
                    'sub_category' => $item->uri,
                        ], ['class' => 'link h5'])
                ?>
            <?php endforeach; ?>

    </div>
</div>

