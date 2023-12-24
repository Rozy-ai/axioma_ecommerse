<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\fileapi\Widget as FileAPI;

/* @var $this yii\web\View */
/* @var $model app\modules\thanks\models\Thanks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thanks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'image')->widget(
            FileAPI::className(), [
        'settings' => [
            'url' => ['/thanks/admin/upload-image']
        ]
            ]
    )->label('Изображение в шапке');
    ?>

    <?= $form->field($model, 'employee_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employee_job')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_enable')->checkbox() ?>

    <?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
