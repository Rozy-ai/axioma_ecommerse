<?php

use yii\helpers\Html;
?>

<div class="news-widget">

    <div class="row">
        <?php if (isset($item[0])): ?>

            <div class="img col-xs-12">
                <div class="title">
                    <?= Html::a($model->h1, ['/' . $model->url], ['class' => 'h4']) ?>
                </div>
                <p><?= $model->anons ?></p>
            </div>

        <?php endif; ?>

    </div>

    <?php
    foreach ($model as $k => $item) {
        echo $this->render('_one', ['model' => $item, 'k' => $k]);
    }
    ?>

</div>

