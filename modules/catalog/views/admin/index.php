<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\catalog\models\SearchCatalog */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="pull-right">
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'parent_id',
//            'model',
//            'user_id',
            'name',
            // 'h1',
            // 'anons:ntext',
            // 'news_date',
            // 'news_type',
            // 'content:ntext',
            // 'content2:ntext',
             'act',
             'ord',
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
             'price',
             'price2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
