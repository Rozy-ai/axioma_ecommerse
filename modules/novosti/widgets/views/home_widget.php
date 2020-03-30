<?php

use yii\helpers\Html;

//var_dump($model);
?>

<?php if ($model): ?>
    <div class="home-news row">
        <div class="col-xs-12 col-sm-8">
            <?php
            foreach ($model as $k => $item):
                ?>

                <?php if (!$k): ?>
                    <div class="new">
                        <p class="h2">Новости</p>
                        <p class="last-news">Последняя новость</p>
                        <p class="h3"><?= $item->header ?></p>
                        <p class="date"><?= Yii::$app->formatter->asDate($item->created_at, 'long') ?></p>
                        <p>
                            <?= $item->content ?>
                        </p>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>

        </div>

        <div class="col-xs-12 col-sm-4">
            <?php
            foreach ($model as $k => $item):
                ?>

                <?php if (!$k): ?>

                <?php else: ?>
                    <div class="new">
                        <?= $this->render('_one', ['model' => $item]) ?>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>

        <div class="col-xs-12">
            <?= Html::a('К другим новостям', ['/novosti'], ['class' => 'more-news-link text-muted']) ?>
        </div>

    </div>

<?php endif; ?>
