<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\portfolio\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Portfolios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Portfolio'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'anons:html',
            'order',
            'title',
//            'description',
            //'keywords',
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}'],
        ],
    ]);
    ?>
</div>
