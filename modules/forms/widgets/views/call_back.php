<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

$this->registerJsFile('@web/js/form/callback.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php
Modal::begin([
    'id' => 'callback-form-modal',
    'header' => '<p class="h2 text-center">Заказать звонок</p>',
    'toggleButton' => [
        'label' => 'Заказать звонок', 'class' => 'btn-link', 'onClick' => "yaCounter23717086.reachGoal('callback-click'); return true;"
    ],
    'class' => 'text-left'
]);
?>

<?php $form = ActiveForm::begin(['id' => 'callback-form', 'enableClientValidation' => true,]); ?>
<div class="text-left">
    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'phone')->textInput() ?>
    <?=
    $form->field($model, 'personal_accept')->checkbox()->label('Я даю согласие на обратобку персональных данных. '
            . Html::a('Ознакомиться с условиями', ['/soglasie'], ['target' => '_blank'])
    )
    ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'onClick' => "yaCounter23717086.reachGoal('callback-sent'); return true;"]) ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>



