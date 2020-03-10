<?php

use yii\bootstrap\Html;
?>

<li>
    <div class="row">
        <div class="col-xs-2">
            <?= Html::img($result['image'], ['class' => 'img img-responsive']) ?>
        </div>
        <div class="col-xs-10">
            <a href="<?= $result['url'] ?>">
                <p class="h4"><?= $result['name'] ?></p>
            </a>
            <p class="category-link">Артикул: <?= $result['article'] ?></p>
            <p class="category-link">Категория: <?=
                ( $model = \app\modules\category\models\Category::findOne($result['category'])) ?
                        Html::a($model->header, [$model->url]) : ''
                ?></p>
        </div>
    </div>
</li>