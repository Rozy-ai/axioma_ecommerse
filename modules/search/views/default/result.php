<?php

use yii\bootstrap\Html;
?>

<li>
    <div class="row">
        <div class="col-xs-4">
            <?= Html::img($result['image'], ['class' => 'img img-responsive']) ?>
        </div>
        <div class="col-xs-8">
            <a href="<?= $result['url'] ?>">
                <p class="h4"><?= $result['name'] ?></p>
            </a>
        </div>
    </div>
</li>