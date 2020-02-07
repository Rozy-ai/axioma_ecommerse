<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

if ($model->type_id == 2) {
    $this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => '/uslugi', 'title' => 'Новости'];
} elseif ($model->type_id == 3) {
    $this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => '/novosti', 'title' => 'Новости'];
} elseif ($model->type_id == 4) {
    $this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => '/stati', 'title' => 'Новости'];
}

$this->params['breadcrumbs'][] = $model->header;
?>
<div class="news">
    <h1><?= $model->header ?></h1>

    <div class=" row">
        <div class="new col-xs-12">
            <div class="content">
                <?= Html::img('/' . $model->Image, ['class' => 'img img-responsive img-rounded']) ?>
                <?= $model->content ?>
            </div>
        </div>
    </div>
</div>
