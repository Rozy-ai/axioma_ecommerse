<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;

$this->registerJsFile('@web/js/form/callback.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php
Modal::begin([
    'id' => 'callback-form-modal',
    'header' => '<p class="h2 text-center">Заказать звонок</p>',
    'toggleButton' => [
        'label' => 'Заказать обратный звонок', 'class' => 'btn-link call-back'
    ],
    'class' => 'text-left'
]);
?>

<?php $form = ActiveForm::begin(['id' => 'callback-form', 'enableClientValidation' => true,]); ?>
<div class="text-left">
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
//        'onClick' => "ym(53040199, 'reachGoal', 'call-back');",
    ])
    ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>



