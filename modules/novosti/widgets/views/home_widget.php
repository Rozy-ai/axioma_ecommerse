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
                <div class="new col-xs-12 col-sm-6">
                    <p class="h3"><?= $item->name ?></p>
                    <p class="date"><?= Yii::$app->formatter->asDate($item->news_date, 'long') ?></p>
                    <div class="content">
                        <?= Html::img('/' . $item->image, ['class' => 'img img-responsive img-rounded']) ?>
                        <?= $item->content ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->render('_one', ['model' => $item]) ?>
                </div>
            <?php endif; ?>

        <?php endforeach; ?>

    </div>

<?php endif; ?>
