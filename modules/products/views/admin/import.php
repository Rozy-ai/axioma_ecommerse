<?php

use yii\widgets\ActiveForm;
use yii\bootstrap\Html;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Import');
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'file')->fileInput(['accept' => 'text/csv']) ?>

<?= Html::submitButton('Отправить') ?>

<?php ActiveForm::end() ?>