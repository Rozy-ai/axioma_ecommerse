<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => '/stati', 'title' => 'Новости'];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title ?></h1>

<div class="stati row">
    <div class="new col-xs-12">
        <p class="h3"><?= $this->title ?></p>
        <div class="content">
            <?= Html::img('/' . $model->image, ['class' => 'img img-responsive img-rounded']) ?>
            <?= $model->content ?>
        </div>
    </div>
</div>
