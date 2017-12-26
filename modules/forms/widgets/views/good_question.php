<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

$this->registerJsFile('@web/js/form/good_question.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php
Modal::begin([
    'id' => 'good-question-form-modal',
    'header' => '<p class="h2">Задать вопрос о товаре</p>',
    'toggleButton' => ['label' => 'Задать вопрос о товаре', 'class' => 'btn btn-success'],
]);
?>

<?php $form = ActiveForm::begin(['id' => 'good-question-form', 'enableClientValidation' => true,]); ?>

<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'phone')->textInput() ?>
<?= $form->field($model, 'email')->textInput() ?>
<?= $form->field($model, 'question')->textarea() ?>
<?= $form->field($model, 'personal_accept')->checkbox() ?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>



