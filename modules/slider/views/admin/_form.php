<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use vova07\fileapi\Widget as FileAPI;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'image')->widget(
            FileAPI::className(), [
        'settings' => [
            'url' => ['/slider/admin/upload-image']
        ]
            ]
    )->label('Изображение');
    ?>

    <?=
    $form->field($model, 'content')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'imageUpload' => Url::to(['/slider/admin/image-upload']),
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
                'fontcolor'
            ]
        ]
    ]);
    ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act')->dropDownList($model::$_act) ?>

    <?= $form->field($model, 'ord')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
