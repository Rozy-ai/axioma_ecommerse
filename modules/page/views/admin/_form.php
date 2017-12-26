<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'anons')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'imageUpload' => Url::to(['/site/image-upload']),
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
                'fontcolor'
            ]
        ]
    ]);
    ?>
    <?=
    $form->field($model, 'content')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'imageUpload' => Url::to(['/site/image-upload']),
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
                'fontcolor'
            ]
        ]
    ]);
    ?>
    <?=
    $form->field($model, 'content2')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'imageUpload' => Url::to(['/site/image-upload']),
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
                'fontcolor'
            ]
        ]
    ]);
    ?>

    <?= $form->field($model, 'act')->checkbox() ?>

    <?= $form->field($model, 'ord')->textInput() ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
