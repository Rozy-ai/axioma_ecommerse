<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\city\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    <p class="pull-right">
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'header',
            [
                'label' => 'Родительская категория',
                'filter' => \app\modules\category\models\Category::__getHeaders(),
                'attribute' => 'parent_id',
                'value' => 'parent.header',
            ],
            [
                'label' => 'Родительская категория 2',
                'filter' => \app\modules\category\models\Category::__getHeaders(),
                'attribute' => 'parent_id2',
                'value' => 'parent2.header',
            ],
            'ord',
            'url',
            'is_enable',
//            'count',
            [
                'attribute' => 'in_menu',
                'filter' => [1 => 'Да', 0 => 'Нет'],
                'value' => function($model) {
                    return $model->in_menu ? 'Да' : 'Нет';
                }
            ],
            [
                'attribute' => 'show_in_home',
                'value' => function($model) {
                    return $model->show_in_home ? 'Да' : 'Нет';
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
