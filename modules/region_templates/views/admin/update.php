<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\region_templates\models\RegionTemplates */

$this->title = 'Обнвоить региональный шаблон данных: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Региональные шаблоны данных', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="region-templates-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
