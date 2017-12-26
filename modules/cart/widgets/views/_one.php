<?php

use yii\helpers\Html;
?>

<div class="col-xs-12 col-sm-6 col-md-3">
    <div class="grid-item">
        <?= Html::img('/' . $model->image, ['class' => 'img', 'height' => 160]) ?>

        <p>
            <?= Html::a($model->name, ['/catalog/' . $model->url], ['class' => 'link']) ?>
        </p>
    </div>
</div>