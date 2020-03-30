<?php

use yii\helpers\Html;
?>
<div class="home-thanks-list">
    <p class="h2">Рекомендации наших клиентов</p>
    <div class="row">
        <?php foreach ($model as $k => $item): ?>

            <div class="<?= !$k ? 'col-xs-6 col-sm-6' : 'col-xs-6 col-sm-3' ?>">
                <a href="<?= $item->img ?>" class="popup">
                    <?= Html::img($item->img, ['class' => 'img img-responsive img-thumbnail']) ?>
                </a>
            </div>

        <?php endforeach; ?>
    </div>
</div>
