<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\region_templates\models\RegionTemplates */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Региональные шаблоны данных', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-templates-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'city_id',
            'name',
            'value:ntext',
        ],
    ]) ?>

</div>
