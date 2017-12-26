<?php

use yii\helpers\Html;

if ($model):
    ?>

    <div class="home-news row">
        <div class="new col-xs-12 col-sm-6">
            <p class="h3"><?= $model->title ?></p>
            <p class="date"><?= Yii::$app->formatter->asDate($model->create_time, 'long') ?></p>
            <div class="content">
                <?= Html::img('/' . $model->image, ['class' => 'img img-responsive img-rounded']) ?>
                <?= $model->content ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <?= app\modules\novosti\widgets\NewsWidget::widget(['ignore_id' => $model->id]) ?>
        </div>
    </div>

<?php endif; ?>
