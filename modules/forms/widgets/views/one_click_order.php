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
<?= $form->field($model, 'image')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'count')->textInput(['value' => 1, 'type' => 'number']) ?>
<?=
$form->field($model, 'personal_accept')->checkbox()->label('Я даю согласие на обработку персональных данных. '
        . Html::a('Ознакомиться с условиями', ['/soglasie'], ['target' => '_blank'])
)
?>

<div class="form-group">
<input type="submit" class="btn btn-primary" onclick="ym(53040199, 'reachGoal', 'one-click'); return true;" value="Узнать цену" />
    <?php 
    // echo
    // Html::submitButton('Отправить', ['class' => 'btn btn-primary',
    // ])
    ?>
</div>

<?php 

$script = <<< JS
    $('#oneclick-form').on('beforeSubmit', function (e) {
        ym(53040199, 'reachGoal', 'one-click');
    });
JS;
$this->registerJs($script, \yii\web\View::POS_READY,);

?>

<?php
ActiveForm::end();

Modal::end();
?>



