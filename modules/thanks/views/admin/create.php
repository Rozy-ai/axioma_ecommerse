<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\thanks\models\Thanks */

$this->title = Yii::t('app', 'Create Thanks');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Thanks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thanks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
