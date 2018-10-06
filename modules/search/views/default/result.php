<?php

use yii\bootstrap\Html;
?>

<li>
    <div class="row">
        <div class="col-xs-3">
            <?= Html::img($result['image'], ['class' => 'img img-responsive']) ?>
        </div>
        <div class="col-xs-9">
            <a href="<?= $result['url'] ?>">
                <p class="h4"><?= $result['name'] ?></p>
            </a>
            <p class="category-link">Артикл: <?= $result['article'] ?></p>
            <p class="category-link">Категория: <?= $model->categoryLink ?></p>
        </div>
    </div>
</li>