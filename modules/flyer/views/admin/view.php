<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

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

    <?= $this->render('_add_modal', ['flyer' => $model]) ?>
    <?=
    GridView::widget([
        'dataProvider' => $goods,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'kartik\grid\EditableColumn',
                'refreshGrid' => true,
                'attribute' => 'order',
                'editableOptions' => [
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    'formOptions' => ['action' => ['/flyer/admin/edit_active']],
//                    'data' => \app\modules\category\models\Category::__getHeaders(),
//                    'data' => [1, 2, 3],
                ],
            ],
            [
                'attribute' => 'image',
                'format' => ['image', ['height' => 100]],
                'value' => 'img',
            ],
            'name',
            [
                'class' => 'kartik\grid\EditableColumn',
                'refreshGrid' => true,
                'attribute' => 'price',
                'editableOptions' => [
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    'formOptions' => ['action' => ['/flyer/admin/edit_active']],
//                    'data' => \app\modules\category\models\Category::__getHeaders(),
//                    'data' => [1, 2, 3],
                ],
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'refreshGrid' => true,
                'attribute' => 'price_new',
                'editableOptions' => [
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    'formOptions' => ['action' => ['/flyer/admin/edit_active']],
//                    'data' => \app\modules\category\models\Category::__getHeaders(),
//                    'data' => [1, 2, 3],
                ],
            ],
            [
                'label' => 'Редактировать',
                'format' => 'raw',
                'value' => function($row) {
                    return Html::a('<span class="glyphicon glyphicon-pencil text-info"></span>', ['edit-flyer-good', 'id' => $row->id]);
                }
            ],
            [
                'label' => 'Удалить',
                'format' => 'raw',
                'value' => function($row) {
                    return Html::a('<span class="glyphicon glyphicon-trash text-danger"></span>', ['delete-flyer-good', 'id' => $row->id]);
                }
            ],
        ],
    ]);
    ?>

</div>
