<?php

use yii\helpers\Html;
?>
<div class="home-thanks-list">
    <p class="h2">Благодарности</p>
    <div class="row">
        <?php foreach ($model as $item): ?>

            <div class="col-xs-4">
                <a href="<?= $item->img ?>" class="popup">
                    <?= Html::img($item->img, ['class' => 'img img-responsive img-thumbnail']) ?>
                </a>
            </div>

        <?php endforeach; ?>
    </div>
</div>
