<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use yii\captcha\Captcha;

$this->registerJsFile('@web/js/form/contact_form.js', ['depends' => ['app\assets\AppAsset']]);
?>
            <?php
            $form = ActiveForm::begin([
                'id' => 'contact-form',
                'enableClientValidation' => true,
                'action' => '/forms/default/contact-form',
                'options' => ['enctype' => 'multipart/form-data']
            ]);
            ?>
<div class="home-contact-form">
    <p>Возникли вопросы ?</p>
    <p class="h2">Получить консультацию специалиста</p>
    <div class="row contact-fields">
        <div class="row">
        <div class="col-xs-12 col-md-3">

            <?= $form->field($model, 'title')->hiddenInput()->label(false); ?>

            <?=
                $form->field($model, 'name')->textInput()
                ?>
            <?=
                $form->field($model, 'phone')->widget(MaskedInput::className(), [
                    'mask' => '+7 (999) 999-9999',
                    'options' => ['class' => 'form-control'],
                ])
                ?>

            <?=
                $form->field($model, 'email')->textInput([
                    'type' => 'email'
                ])
                ?>


            <div class="form-group fileds-radio">
                <input type="radio" name="option" value="option1" checked id="option1">
                Получить ответ на e-mail
                &nbsp;
                <input type="radio" name="option" value="option2" id="option2">
                Перезвонить
            </div>

        </div>
        <div class="col-xs-12 col-md-9">
            <?=
                $form->field($model, 'message')->textarea([
                    'placeholder' => 'Текст вопроса ...',
                    'rows' => 7,
                ])
                ?>
                        <?= $form->field($model, 'file')->fileInput(['class'=>'custom-file-input'])->label('<i class="fas fa-paperclip" style="color: #b8cc76;"></i>') ?>
        </div>
        </div>
        <div class="row">
        <div class="col-xs-12 col-md-9">
            <!-- <p class="star-text">*Поля обязательны для заполнения</p> -->
            <p class="politic-text">*Нажимая кнопку «Отправить» Вы соглашаетесь с
                <a href="/soglasie">политикой конфиденциальности</a> сайта.
            </p>
            <p>**Вы можете самостоятельно связаться со специалистом компании «Аксиома» по бесплатному номеру телефону 8
                (800) 333-54-83</p>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="form-group button-wrap">
                <?=
                    Html::submitButton('Отправить', [
                        'class' => 'btn btn-primary',
                    ])
                    ?>
            </div>
        </div>
        </div>
    </div>
</div>
</div>
<?php

$script = <<<JS
    $('#contact-form').on('beforeSubmit', function (e) {
        ym(53040199,'reachGoal','feed-back');
    });
//     const option1 = document.getElementById('option1');
// const option2 = document.getElementById('option2');
// const option1Data = document.getElementById('option1-data');
// const option2Data = document.getElementById('option2-data');

// option1.addEventListener('change', function() {
//   if (this.checked) {
//     option1Data.style.display = 'block';
//     option2Data.style.display = 'none';
//   }
// });

// option2.addEventListener('change', function() {
//   if (this.checked) {
//     option1Data.style.display = 'none';
//     option2Data.style.display = 'block';
//   }
// });
JS;
$this->registerJs($script, \yii\web\View::POS_READY, );

?>


<?php
ActiveForm::end();
?>