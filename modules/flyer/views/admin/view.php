<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\flyer\models\Flyer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Flyers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flyer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Print'), ['print', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Copy'), ['copy', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'created_at:datetime',
        ],
    ])
    ?>
    <div class="row well">
        <div class="col-xs-1">
            порядок
        </div>
        <div class="col-xs-1">
            изображение
        </div>
        <div class="col-xs-3">
            наименование
        </div>
        <div class="col-xs-1">
            старая цена
        </div>
        <div class="col-xs-1">
            новая цена
        </div>
        <div class="col-xs-1">
            редактировать
        </div>
        <div class="col-xs-1">
            удалить
        </div>
    </div>
    <?php
    foreach ($goods as $good)
        echo $this->render('_good', ['model' => $good]);
    ?>

    <?= $this->render('_add_modal', ['flyer' => $model]) ?>

</div>
