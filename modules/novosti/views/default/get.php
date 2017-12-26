<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => '/news', 'title' => 'Новости'];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title ?></h1>

<div class="news row">
    <div class="new col-xs-12 col-sm-6">
        <p class="h3"><?= $this->title ?></p>
        <p class="date"><?= Yii::$app->formatter->asDate($model->create_time, 'long') ?></p>
        <div class="content">
            <?= Html::img('/' . $model->image, ['class' => 'img img-responsive img-rounded']) ?>
            <?= $model->content ?>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6">
        <?= app\modules\novosti\widgets\NewsWidget::widget(['ignore_id' => $model->id]) ?>
    </div>
</div>
