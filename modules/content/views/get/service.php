<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => '/uslugi', 'title' => 'Новости'];
$this->params['breadcrumbs'][] = $model->header;
?>


<div class="uslugi">

    <div class="col-xs-12 col-sm-3">

        <?=
        app\modules\content\widgets\MenuService::widget([
            'current_id' => $model->id
        ])
        ?>

        #zakaz

    </div>
    <div class="col-xs-12 col-sm-9">

        <h1><?= $model->header ?></h1>

        <div class="content">
            <?= $model->content ?>
        </div>

    </div>
</div>