<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\products\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'article',
            'category_id',
            'header',
            'price',
            'url:url',
            [
                'label' => 'Количество изображений',
                'value' => function ($row) {
                    return count($row->productImages);
                }
            ],
            //'content_info:ntext',
            //'content_description:ntext',
            //'content_characteristics:ntext',
            //'content_install:ntext',
            //'ord',
            //'title',
            //'description',
            //'keywords',
            //'is_enable',
            //'created_at',
            //'updated_at',
            //'supported_products',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
