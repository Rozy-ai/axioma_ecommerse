<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

if ($model->type_id == 2) {
    $this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => '/uslugi', 'title' => 'Услуги'];
} elseif ($model->type_id == 3) {
    $this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => '/novosti', 'title' => 'Новости'];
} elseif ($model->type_id == 4) {
    $this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => '/stati', 'title' => 'Статьи'];
}

$this->params['breadcrumbs'][] = $model->header;
?>

<h1><?= $model->header ?></h1>

<div class="uslugi row">
    <div class="new col-xs-12">
        <div class="content">
            <?= Html::img('/' . $model->image, ['class' => 'img img-responsive img-rounded']) ?>
            <?= $model->content ?>
        </div>
    </div>
</div>
