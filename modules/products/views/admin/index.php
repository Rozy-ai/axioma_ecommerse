<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\products\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-xs-8">
            <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col-xs-2">
            Экспорт
            <?php
            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
//        'columns' => $gridColumns,
                'exportConfig' => [
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_PDF => false,
                    ExportMenu::FORMAT_CSV => false,
                    ExportMenu::FORMAT_EXCEL => false,
                    ExportMenu::FORMAT_HTML => false,
                ],
            ]);
            ?>
        </div>
        <div class="col-xs-2">
            <?= Html::a(Yii::t('app', 'Import'), ['import'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>


    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'article',
        'category_id',
        'header',
        'price',
        'url:url',
        'ord',
        [
            'label' => 'Количество изображений',
            'value' => function ($row) {
                return count($row->productImages);
            }
        ],
        [
            'attribute' => 'show_in_recomended',
            'value' => function($model) {
                return $model->show_in_recomended ? 'Да' : 'Нет';
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
    ];
    ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns
    ]);
    ?>
</div>
