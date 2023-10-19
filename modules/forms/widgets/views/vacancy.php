<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;
use yii\captcha\Captcha;

$this->registerJsFile('@web/js/form/vacancy_form.js', ['depends' => ['app\assets\AppAsset']]);

    $label = ['label' => 'откликнуться', 'class' => 'btn btn-primary send-doc'];
?>

<?php
Modal::begin([
    'id' => 'vacancy-form-modal',
    'header' => '<p class="text-center">Заинтересовала вакансия?</p><p class="h2 text-center">Отправить Резюме</p>',
    'toggleButton' => $label,
    'class' => 'text-center'
]);
?>

<?php $form = ActiveForm::begin(['id' => 'vacancy-form', 'enableClientValidation' => true,]); ?>
<div class="text-left vacancy-form">
    <?= $form->field($model, 'title')->hiddenInput()->label(false); ?>
    <?= $form->field($model, 'name')->textInput() ?>
    <?=
    $form->field($model, 'phone')->widget(MaskedInput::className(), [
        'mask' => '+7 (999) 999-9999',
        'options' => ['placeholder' => 'Телефон', 'class' => 'form-control'],
    ])
    ?>
     <?= $form->field($model, 'position')->textInput() ?>

        <p><?php echo Html::img('/image/ico/Прикрепить.svg', ['class' => 'img img-responsive attach-icon', 'alt' => 'Прикрепить', 'onerror' => "this.src='logo.png'"]); ?> Прикрепить резюме</p>
<div class="col-xs-12 text-center">
            <!-- <p class="star-text">*Поля обязательны для заполнения</p> -->
            <p class="politic-text">*Нажимая кнопку «Отправить» Вы соглашаетесь с
                <a href="/soglasie">политикой конфиденциальности</a> сайта.
            </p>
        </div>

</div>
<div class="form-group text-center">
    <?=
    Html::submitButton('откликнуться', [
        'class' => 'btn btn-primary send-doc w-80',
    ])
    ?>
</div>

<?php 

$script = <<< JS
    $('#vacancy-form').on('beforeSubmit', function (e) {
        ym(53040199, 'reachGoal', 'feed-back');
    });
JS;
$this->registerJs($script, \yii\web\View::POS_READY,);

?>

<?php
ActiveForm::end();

Modal::end();
?>



