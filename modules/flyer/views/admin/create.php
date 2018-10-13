<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\flyer\models\Flyer */

$this->title = Yii::t('app', 'Create Flyer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Flyers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flyer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
