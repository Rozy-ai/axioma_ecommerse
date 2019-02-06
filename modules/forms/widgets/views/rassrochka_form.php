<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
?>

<div class="rassrochka-form well">

    <p class="h2">ЗАЯВКА НА РАССРОЧКУ</p>

    <?php
    $form = ActiveForm::begin([
                'id' => 'rassrochka-form',
                'enableClientValidation' => true,
                'action' => '/forms/default/rassrochka',
    ]);
    ?>

    <?=
    $form->field($model, 'name_organization')->textInput([
        'placeholder' => $model->getAttributeLabel('name_organization')
    ])->label(false)
    ?>
    <?=
    $form->field($model, 'inn')->textInput([
        'placeholder' => $model->getAttributeLabel('inn')
    ])->label(false)
    ?>
    <?=
    $form->field($model, 'email')->textInput([
        'placeholder' => $model->getAttributeLabel('email')
    ])->label(false)
    ?>
    <?=
    $form->field($model, 'summ')->textInput([
        'placeholder' => $model->getAttributeLabel('summ')
    ])->label(false)
    ?>
    <?=
    $form->field($model, 'time')->dropDownList($model->_time)->label(false)
    ?>
    <?=
    $form->field($model, 'phone')->widget(MaskedInput::className(), [
        'mask' => '+7 (999) 999-9999',
        'options' => ['placeholder' => 'ТЕЛЕФОН', 'class' => 'form-control'],
    ])->label(false)
    ?>

    <!--<p class="star-text">*Поля обязательны для сохранения</p>-->
    <p class="politic-text">Нажимая кнопку «Отправить» Вы соглашаетесь с
        <a href="/politic">политикой конфиденциальности</a> сайта.</p>

    <div class="form-group button-wrap">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
</div>


<?php
ActiveForm::end();
?>



