<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
?>

<div class="rassrochka-form col-xs-12 col-sm-offset-2 col-sm-8">

    <p class="h2">ЗАЯВКА НА РАССРОЧКУ</p>
    <?php
    $form = ActiveForm::begin([
                'id' => 'rassrochka-form',
                'enableClientValidation' => true,
                'action' => '/forms/default/rassrochka',
    ]);
    ?>
    <div class="row">

        <div class="col-sm-8">

            <?=
            $form->field($model, 'name_organization')->textInput([
                'placeholder' => $model->getAttributeLabel('name_organization') . '... *'
            ])->label(false)
            ?>
            <?=
            $form->field($model, 'inn')->textInput([
                'placeholder' => $model->getAttributeLabel('inn') . '... *'
            ])->label(false)
            ?>
            <?=
            $form->field($model, 'email')->textInput([
                'placeholder' => $model->getAttributeLabel('email') . '... *'
            ])->label(false)
            ?>
            <p class="star-text text-muted">* Поля обязательны для заполнения</p>
            <p class="politic-text text-danger">Нажимая кнопку «Отправить» Вы соглашаетесь с
                <a href="/politic">политикой конфеденциальности</a> сайта.</p>
        </div>
        <div class="col-sm-4">
            <?=
            $form->field($model, 'summ')->textInput([
                'placeholder' => $model->getAttributeLabel('summ') . '... *'
            ])->label(false)
            ?>
            <?=
            $form->field($model, 'time')->dropDownList($model->_time)->label(false)
            ?>
            <?=
            $form->field($model, 'phone')->widget(MaskedInput::className(), [
                'mask' => '+7 (999) 999-9999',
                'options' => ['placeholder' => 'ТЕЛЕФОН' . '... *', 'class' => 'form-control'],
            ])->label(false)
            ?>
            <div class="form-group button-wrap">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>




