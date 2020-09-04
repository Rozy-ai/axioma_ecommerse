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

$pages_id = [94, 96, 97, 98, 99, 100, 119,118]; // странички для менюшки преимуществ
?>

<?php if (in_array($model->id, $pages_id)): ?>

    <?= $this->render('_advanteges_menu'); ?>

<?php endif; ?>

<h1><?= $model->header ?></h1>


<div class="uslugi row">
    <div class="new col-xs-12">
        <div class="content">
            <?= $model->content ?>
        </div>

        <?php
        if ($model->url == 'oborudovanie-v-rassrochku')
            echo app\modules\forms\widgets\RassrochkaWidget::widget();
        ?>
        <?php
        if ($model->url == 'trade-in')
            echo app\modules\forms\widgets\TradeInWidget::widget();
        ?>
    </div>
</div>

