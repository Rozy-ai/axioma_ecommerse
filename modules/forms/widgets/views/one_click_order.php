<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

$this->registerJsFile('@web/js/form/one_click.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php
Modal::begin([
    'id' => 'oneclick-form-modal',
    'header' => '<p class="h2">Купить в 1 клик</p>',
    'toggleButton' => ['label' => 'Купить в 1 клик', 'class' => 'btn btn-success'],
]);
?>

<?php $form = ActiveForm::begin(['id' => 'oneclick-form', 'enableClientValidation' => true,]); ?>

<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'phone')->textInput() ?>
<?= $form->field($model, 'good')->textInput(['value' => $product->name, 'disabled' => 'disabled']) ?>
<?= $form->field($model, 'count')->textInput(['value' => 1, 'type' => 'number']) ?>
<?= $form->field($model, 'personal_accept')->checkbox() ?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>



