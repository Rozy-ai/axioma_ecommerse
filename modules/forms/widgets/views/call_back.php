<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;
use yii\captcha\Captcha;

$this->registerJsFile('@web/js/form/callback.js', ['depends' => ['app\assets\AppAsset']]);

if ($in_footer)
    $label = ['label' => 'Заказать обратный звонок', 'class' => 'btn-link call-back'];
else
    $label = ['label' => 'Перезвоните мне', 'class' => 'btn btn-primary call-back'];
?>

<?php
Modal::begin([
    'id' => 'callback-form-modal',
    'header' => '<p class="h2 text-center">Заказать звонок</p>',
    'toggleButton' => $label,
    'class' => 'text-left'
]);
?>

<?php $form = ActiveForm::begin(['id' => 'callback-form', 'enableClientValidation' => true,]); ?>
<div class="text-left">
    <?= $form->field($model, 'title')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'name')->textInput() ?>
    <?=
    $form->field($model, 'phone')->widget(MaskedInput::className(), [
        'mask' => '+7 (999) 999-9999',
        'options' => ['placeholder' => 'Телефон', 'class' => 'form-control'],
    ])
    ?>
    <?=
    $form->field($model, 'personal_accept')->checkbox()->label('Я даю согласие на обработку персональных данных. '
            . Html::a('Ознакомиться с условиями', ['/soglasie'], ['target' => '_blank'])
    )
    ?>


</div>
<div class="form-group">
    <?=
    Html::submitButton('Отправить', [
        'class' => 'btn btn-primary',
    ])
    ?>
</div>

<?php 

$script = <<< JS
    $('#callback-form').on('beforeSubmit', function (e) {
        ym(53040199, 'reachGoal', 'feed-back');
    });
JS;
$this->registerJs($script, \yii\web\View::POS_READY,);

?>

<?php
ActiveForm::end();

Modal::end();
?>



