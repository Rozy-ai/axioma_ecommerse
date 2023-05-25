<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use yii\captcha\Captcha;

$this->registerJsFile('@web/js/form/contact_form.js', ['depends' => ['app\assets\AppAsset']]);
?>

<div class="home-contact-form">

    <p class="h2">Свяжитесь с нами</p>

    <?php
    $form = ActiveForm::begin([
                'id' => 'contact-form',
                'enableClientValidation' => true,
    ]);
    ?>

    <?= $form->field($model, 'title')->hiddenInput()->label(false); ?>

    <?=
    $form->field($model, 'name')->textInput([
        'placeholder' => $model->getAttributeLabel('name')
    ])->label(false)
    ?>
    <?=
    $form->field($model, 'email')->textInput([
        'placeholder' => $model->getAttributeLabel('email')
    ])->label(false)
    ?>
    <?=
    $form->field($model, 'message')->textarea([
        'placeholder' => $model->getAttributeLabel('message'),
        'rows' => 8,
    ])->label(false)
    ?>


    <p class="star-text">*Поля обязательны для заполнения</p>
    <p class="politic-text">Нажимая кнопку «Отправить» Вы соглашаетесь с
        <a href="/soglasie">политикой конфиденциальности</a> сайта.</p>


    <div class="form-group button-wrap">
        <?=
        Html::submitButton('Отправить', [
            'class' => 'btn btn-primary',
        ])
        ?>
    </div>
</div>

<?php 

$script = <<< JS
    $('#callback-form').on('beforeSubmit', function (e) {
        ym(53040199,'reachGoal','feed-back');
    });
JS;
$this->registerJs($script, \yii\web\View::POS_READY,);

?>


<?php
ActiveForm::end();
?>



