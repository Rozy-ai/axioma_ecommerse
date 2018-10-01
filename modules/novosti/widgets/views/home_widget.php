<?php

use yii\helpers\Html;
use Yii;

//var_dump($model);
?>

<?php if ($model): ?>
    <div class="home-news row">
        <?php
        foreach ($model as $k => $item):
            ?>

            <?php if (!$k): ?>
                <div class="new col-xs-12 col-sm-7">
                    <p class="h2">Последние новости</p>
                    <p class="h3"><?= $item->name ?></p>
                    <p class="date"><?= Yii::$app->formatter->asDate($item->news_date, 'long') ?></p>
                    <p>
                        <?= $item->content ?>
                    </p>
                </div>
            <?php else: ?>
                <div class="col-xs-12 col-sm-5">
                    <?= $this->render('_one', ['model' => $item]) ?>
                </div>
            <?php endif; ?>

        <?php endforeach; ?>

    </div>

<?php endif; ?>
