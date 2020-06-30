<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\seo_template\models\SeoTemplate */

$this->title = Yii::t('app', 'Create Seo Template');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Seo Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-template-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
