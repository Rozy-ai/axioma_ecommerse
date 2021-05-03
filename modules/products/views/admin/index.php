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
//        'category',
        'header',
        
//        'short_name',
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'category_id',
            'format' => 'raw',
            'editableOptions' => [
//                'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
                'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                'formOptions' => ['action' => ['/products/admin/edit-column']],
                'data' => app\modules\category\models\Category::__getHeaders(),
            ],
            'value' => function ($row) {
                return $row->category->header;
            },
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'fastcat_id',
            'format' => 'raw',
            'filter' => app\modules\fast_category\models\FastCategory::__getHeaders(),
            'editableOptions' => [
//                'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
                'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                'formOptions' => ['action' => ['/products/admin/edit-column']],
                'data' => app\modules\fast_category\models\FastCategory::__getHeaders(),
            ],
            'value' => function ($row) {
                return ($row->fastCat) ? $row->fastCat->header : '';
            },
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'is_ip',
            'format' => 'raw',
            'editableOptions' => [
//                'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
                'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX,
                'formOptions' => ['action' => ['/products/admin/edit-column']],
            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'is_tvi',
            'format' => 'raw',
            'editableOptions' => [
//                'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
                'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX,
                'formOptions' => ['action' => ['/products/admin/edit-column']],
                'data' => app\modules\fast_category\models\FastCategory::__getHeaders(),
            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'is_akustika',
            'format' => 'raw',
            'editableOptions' => [
//                'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
                'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX,
                'formOptions' => ['action' => ['/products/admin/edit-column']],
            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'is_radio',
            'format' => 'raw',
            'editableOptions' => [
//                'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
                'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX,
                'formOptions' => ['action' => ['/products/admin/edit-column']],
                'data' => app\modules\fast_category\models\FastCategory::__getHeaders(),
            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'is_enable',
            'format' => 'raw',
            'editableOptions' => [
//                'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
                'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX,
                'formOptions' => ['action' => ['/products/admin/edit-column']],
                'data' => app\modules\fast_category\models\FastCategory::__getHeaders(),
            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'online_kass_type',
            'format' => 'raw',
            'filter' => \app\modules\products\models\Product::ONLINE_KASS_TYPE,
            'editableOptions' => [
//                'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
                'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                'formOptions' => ['action' => ['/products/admin/edit-column']],
                'data' => \app\modules\products\models\Product::ONLINE_KASS_TYPE,
            ],
            'value' => function ($row) {
                return ($row->online_kass_type) ? \app\modules\products\models\Product::ONLINE_KASS_TYPE[$row->online_kass_type] : '';
            },
        ],
        [],
        [],
        [],
        [],
        [],
//        'price',
//        'url:url',
//        'ord',
//        [
//            'label' => 'Количество изображений',
//            'value' => function ($row) {
//                return count($row->productImages);
//            }
//        ],
//        [
//            'attribute' => 'show_in_recomended',
//            'value' => function($model) {
//                return $model->show_in_recomended ? 'Да' : 'Нет';
//            }
//        ],
        //'content_info:ntext',
        //'content_description:ntext',
        //'content_characteristics:ntext',
        //'content_install:ntext',
        //'ord',
//        'title',
//        'description',
//        'keywords',
//        'is_enable',
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
