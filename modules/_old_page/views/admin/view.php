<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\page\models\Page */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_id',
            'cat_main',
            'cats',
            'model',
            'user_id',
            'name',
            'h1',
            'anons:ntext',
            'news_date',
            'news_type',
            'content:ntext',
            'content2:ntext',
            'act',
            'ord',
            'url:url',
            'title',
            'keywords',
            'description',
            'create_time',
            'update_time',
            'image',
            'file',
            'priority',
            'visit_counter',
            'price',
            'price2',
        ],
    ]) ?>

</div>
