<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

$this->registerJsFile('@web/js/form/contact_form.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php $form = ActiveForm::begin(['id' => 'contact-form', 'enableClientValidation' => true,]); ?>

<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'email')->textInput() ?>
<?= $form->field($model, 'message')->textarea() ?>

<p class="star-text">*Поля обязательны для сохранения</p>
<p class="politic-text">Нажимая кнопку «Отправить» Вы соглашаетесь с
    <a href="/politic">политикой конфеденциальности</a> сайта.</p>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>


<?php
ActiveForm::end();
?>



