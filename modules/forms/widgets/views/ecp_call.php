<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;

$this->registerJsFile('@web/js/form/ecp_call.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php $form = ActiveForm::begin(['id' => 'ecp-call-form', 'enableClientValidation' => true,]); ?>

<div class="form-wrap">
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'name')->textInput() ?>
        </div>
        <div class="col-sm-4">
            <?=
            $form->field($model, 'phone')->widget(MaskedInput::className(), [
                'mask' => '+7 (999) 999-9999',
                'options' => ['placeholder' => '+7 (999) 999-9999', 'class' => 'form-control'],
            ])
            ?>
        </div>
        <div class="col-sm-4">

            <?=
            Html::submitButton('Отправить', [
                'class' => 'btn btn-primary',
            ])
            ?>
        </div>
    </div>

    <div class="politic">
        Нажимая кнопку «ОТПРАВИТЬ» Вы соглашаетесь с <a href="/soglaschenie" target="_blank">политикой конфиденциальности</a> сайта.
    </div>
</div>

<?php ActiveForm::end(); ?>



