<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="uslugi">

    <div class="col-xs-12 col-sm-4">

        <?=
        app\modules\content\widgets\MenuService::widget([
            'current_id' => $model->id
        ])
        ?>

    </div>
    <div class="col-xs-12 col-sm-8">

        <h1><?= $model->header ?></h1>

        <div class="content">
            <?= $model->content; ?>
        </div>

    </div>
</div>