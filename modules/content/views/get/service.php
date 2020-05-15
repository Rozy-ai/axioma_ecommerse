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
<div class="uslugi row">

    <div class="col-xs-12 col-sm-3">

        <?=
        app\modules\content\widgets\MenuService::widget([
            'current_id' => $model->id
        ])
        ?>

    </div>
    <div class="col-xs-12 col-sm-9">

        <h1><?= $model->header ?></h1>

        <div class="content">
            <?= $model->content; ?>
        </div>

    </div>
</div>