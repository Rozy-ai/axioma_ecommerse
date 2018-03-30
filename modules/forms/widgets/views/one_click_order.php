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
    'toggleButton' => ['label' => 'Купить в 1 клик', 'class' => 'btn btn-success', 'onClick' => "yaCounter23717086.reachGoal('oneclick'); return true;"],
]);
?>

<?php $form = ActiveForm::begin(['id' => 'oneclick-form', 'enableClientValidation' => true,]); ?>

<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'phone')->textInput() ?>
<?= $form->field($model, 'good')->textInput(['value' => $product->name, 'disabled' => 'disabled']) ?>
<?= $form->field($model, 'good')->hiddenInput(['value' => $product->name]) ?>
<?= $form->field($model, 'count')->textInput(['value' => 1, 'type' => 'number']) ?>
<?=
$form->field($model, 'personal_accept')->checkbox()->label('Я даю согласие на обратобку персональных данных. '
        . Html::a('Ознакомиться с условиями', ['/soglasie'], ['target' => '_blank'])
)
?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary',
        'onClick' => "yaCounter23717086.reachGoal('oneclick-sent'); return true;"])
    ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>



