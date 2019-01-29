<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;

$this->title = 'Подписаться на рассылку';
?>

<div class="subscribe-form">
    <h1><?= $this->title ?></h1>
    <?php $form = ActiveForm::begin(['id' => 'callback-form', 'enableClientValidation' => true,]); ?>
    <div class="form-group">
        <?= $form->field($model, 'email')->textInput() ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php
    ActiveForm::end();
    ?>

<script src="//static-login.sendpulse.com/apps/fc3/build/loader.js" sp-form-id="300755de352cf72f4aff36f22360ac06e5579f8a607769c15f467d4b6215edc8"></script>


</div>