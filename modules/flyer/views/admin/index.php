<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\flyer\models\FlyerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Flyers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flyer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Flyer'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'created_at:datetime',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-th-list"></span>', $url, [
                                    'title' => 'Элементы',
                                    'data-pjax' => '0',
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'data-confirm' => 'Точно удалить',
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                        ]);
                    },
                ],
            ],
        ],
    ]);
    ?>
</div>
