<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_id',
            'cat_main',
            'cats',
            'model',
            // 'user_id',
            // 'name',
            // 'h1',
            // 'anons:ntext',
            // 'news_date',
            // 'news_type',
            // 'content:ntext',
            // 'content2:ntext',
            // 'act',
            // 'ord',
            // 'url:url',
            // 'title',
            // 'keywords',
            // 'description',
            // 'create_time',
            // 'update_time',
            // 'image',
            // 'file',
            // 'priority',
            // 'visit_counter',
            // 'price',
            // 'price2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
