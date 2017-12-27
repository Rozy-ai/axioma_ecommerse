<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\robots\models\Robots */

$this->title = 'Create Robots';
$this->params['breadcrumbs'][] = ['label' => 'Robots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="robots-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
