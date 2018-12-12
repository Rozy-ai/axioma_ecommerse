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

$pages_id = [87, 88, 89, 90, 91, 92];
?>

<?php if (in_array($model->id, $pages_id)): ?>

    <?= $this->renderAjax('_advanteges_menu'); ?>

<?php endif; ?>

<h1><?= $model->header ?></h1>


<div class="uslugi row">
    <div class="new col-xs-12">
        <div class="content">
            <?= Html::img('/' . $model->image, ['class' => 'img img-responsive img-rounded']) ?>
            <?= $model->content ?>
        </div>
    </div>
</div>
