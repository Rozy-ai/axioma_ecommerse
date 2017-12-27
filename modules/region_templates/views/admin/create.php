<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\region_templates\models\RegionTemplates */

$this->title = 'Добавить региональный шаблон данных';
$this->params['breadcrumbs'][] = ['label' => 'Региональные шаблоны данных', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-templates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
