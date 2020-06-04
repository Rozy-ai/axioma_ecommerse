<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
?>


    <!--<p class="h2">ЗАЯВКА НА РАССРОЧКУ</p>-->
<?php
$form = ActiveForm::begin([
            'id' => 'tradeIn-form',
            'enableClientValidation' => true,
            'action' => '/forms/default/trade-in',
        ]);
?>
<div class="row">

    <div class="col-xs-12 col-sm-6">

        <hr/>

        <?=
        $form->field($model, 'name')->textInput([
            'placeholder' => $model->getAttributeLabel('name') . '... *'
        ])->label(false)
        ?>

        <?=
        $form->field($model, 'email')->textInput([
            'placeholder' => $model->getAttributeLabel('email') . '... *'
        ])->label(false)
        ?>

        <?=
        $form->field($model, 'phone')->widget(MaskedInput::className(), [
            'mask' => '+7 (999) 999-9999',
            'options' => ['placeholder' => 'Телефон' . '... *', 'class' => 'form-control'],
        ])->label(false)
        ?>

        <?=
        $form->field($model, 'body')->textarea([
            'placeholder' => $model->getAttributeLabel('body') . '... *'
        ])->label(false)
        ?>

        <p class="star-text text-muted">* Поля обязательны для заполнения</p>
        <p class="politic-text text-danger">Нажимая кнопку «Отправить» Вы соглашаетесь с
            <a href="/politic">политикой конфеденциальности</a> сайта.
        </p>

        <div class="form-group button-wrap">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>





