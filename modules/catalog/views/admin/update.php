<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\catalog\models\Catalog */

$this->title = 'Update Catalog: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Catalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="catalog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
