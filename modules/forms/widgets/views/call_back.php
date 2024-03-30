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
    'header' => '<p class="text-center">Возникли вопросы?</p><p class="h2 text-center">ЗАКАЗАТЬ ОБРАТНЫЙ ЗВОНОК</p>',
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
    <div class="form-group">
        <p class="politic-text text-center">*Нажимая кнопку «Оформить» Вы соглашаетесь с
            <a href="/soglasie">политикой конфиденциальности</a> сайта.
        </p>
    </div>
    <?php
    //  echo $form->field($model, 'personal_accept')->checkbox()->label(
    //         'Я даю согласие на обработку персональных данных. '
    //         . Html::a('Ознакомиться с условиями', ['/soglasie'], ['target' => '_blank'])
    //     )
        ?>


</div>
<div class="form-group text-center">
<input type="submit" class="btn btn-primary call_back_btn" onclick="ym(53040199, 'reachGoal', 'call-back'); return true;" value="ОТПРАВИТЬ" />

    <?php 
    // echo
    // Html::submitButton('Отправить', [
    //     'class' => 'btn btn-primary',
    // ])
    ?>
</div>

<?php 

$script = <<< JS
    $('#callback-form').on('beforeSubmit', function (e) {
        ym(53040199, 'reachGoal', 'call-back');
    });
JS;
$this->registerJs($script, \yii\web\View::POS_READY,);

?>

<?php
ActiveForm::end();

Modal::end();
?>



