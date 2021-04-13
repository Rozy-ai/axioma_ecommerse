<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;

$this->registerJsFile('@web/js/form/markirovka.js', ['depends' => ['app\assets\AppAsset']]);

$form = ActiveForm::begin(['id' => 'markirovka-form', 'enableClientValidation' => true,]);
?>

<div class="pile">
    <div class="row">

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


        </div>
        <div class="col-sm-12 col-md-4">
            <?=
            Html::submitButton('ОТПРАВИТЬ', [
                'class' => 'btn btn-primary center-block',
            ])
            ?>
        </div>

    </div>

    <div class="politic">
        Нажимая кнопку «ОТПРАВИТЬ» Вы соглашаетесь с <a href="/soglaschenie" target="_blank">политикой конфиденциальности</a> сайта.
    </div>

</div>





<?php
ActiveForm::end();
?>



