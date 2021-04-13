<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;

$this->registerJsFile('@web/js/form/ecp.js', ['depends' => ['app\assets\AppAsset']]);

$form = ActiveForm::begin(['id' => 'ecp-form', 'enableClientValidation' => true,]);
?>

<div class="pile">
    <div class="row">
        <div class="col-sm-12 col-md-4">

            <div class="title">

                ЭЛЕКТРОННАЯ ПОДПИСЬ
                <span>для бизнес-задач</span>


            </div>

            <div class="text">
                Квалифицированная электронная подпись для взаимодействия с госсистемами, регистрации онлайн-касс и других задач.
            </div>

            <div class="price">
                2 900 ₽

                <span class="descr">(Срок действия 12 месяцев)</span>
            </div>

            <?=
            Html::submitButton('ПОЛУЧИТЬ ЭЦП', [
                'class' => 'btn btn-primary center-block',
            ])
            ?>


        </div>
        <div class="col-sm-12 col-md-8">

            <div class="row row-1">
                <div class="col-sm-12 col-md-6">
                    <?= $form->field($model, 'name')->textInput() ?>
                </div>
                <div class="col-sm-12 col-md-6">
                    <?=
                    $form->field($model, 'phone')->widget(MaskedInput::className(), [
                        'mask' => '+7 (999) 999-9999',
                        'options' => ['placeholder' => '+7 (999) 999-9999', 'class' => 'form-control'],
                    ])
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <?= $form->field($model, 'email')->textInput() ?>
                </div>
                <div class="col-sm-12 col-md-6">
                    <?= $form->field($model, 'inn')->textInput() ?>
                </div>
            </div>

            <div class="disclamer">
                * Для оформления электронной подписи (ЭЦП) необходимы следующие документы в отсканированном виде: ИНН, ОГРН, СНИЛС, паспорт (разворот фото и прописка), для “ООО” приказ о назначении директора.

            </div>
            <div class="politic">
                Нажимая кнопку «ПОЛУЧИТЬ ЭЦП» Вы соглашаетесь с <a href="/soglaschenie" target="_blank">политикой конфиденциальности</a> сайта.
            </div>

        </div>
    </div>
</div>





<?php
ActiveForm::end();
?>



