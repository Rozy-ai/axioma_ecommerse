<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;
use yii\captcha\Captcha;

$this->registerJsFile('@web/js/form/one_click.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php
Modal::begin([
    'id' => 'oneclick-form-modal',
    'header' => '<p class="h2">Узнать цену</p>',
]);
?>

<?php $form = ActiveForm::begin(['id' => 'oneclick-form', 'enableClientValidation' => true,]); ?>

<?= $form->field($model, 'name')->textInput() ?>
<?=
$form->field($model, 'phone')->widget(MaskedInput::className(), [
    'mask' => '+7 (999) 999-9999',
    'options' => ['placeholder' => 'Телефон', 'class' => 'form-control'],
])
?>
<?= $form->field($model, 'good')->textInput(['readonly' => 'true']) ?>
<?= $form->field($model, 'count')->textInput(['value' => 1, 'type' => 'number']) ?>
<?=
$form->field($model, 'personal_accept')->checkbox()->label('Я даю согласие на обработку персональных данных. '
        . Html::a('Ознакомиться с условиями', ['/soglasie'], ['target' => '_blank'])
)
?>

    <?= $form->field($model, 'captcha')
        ->hint('Нажмите на картинку, чтобы обновить')
        ->widget(Captcha::className()) ?>

<div class="form-group">
    <?=
    Html::submitButton('Отправить', ['class' => 'btn btn-primary',
        'onClick' => "ym(53040199, 'reachGoal', 'one-click');"
    ])
    ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>



