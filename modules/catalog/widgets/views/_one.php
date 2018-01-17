<?php

use yii\helpers\Html;
?>

<div class="col-xs-12 col-sm-6 col-md-3">
    <a href="/category/<?= $model->uri ?>">
        <div class="grid-item">
            <?= Html::img($model->image, ['class' => 'img', 'height' => 160]) ?>
            <p>
                <?= Html::a($model->title, ['/category/' . $model->uri], ['class' => 'link']) ?>
            </p>
        </div>
    </a>
</div>