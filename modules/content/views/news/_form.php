<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use kartik\datecontrol\DateControl;
use vova07\fileapi\Widget as FileAPI;
?>

<div class="page-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-xs-8">
            <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

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
                    ],
                    'replaceDivs' => false,
                    'deniedTags' => ['style']
                ]
            ]);
            ?>
            <?=
            $form->field($model, 'content')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'minHeight' => 500,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'fontcolor'
                    ],
                    'replaceDivs' => false,
                    'deniedTags' => ['style']
                ]
            ]);
            ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

            <?=
            $form->field($model, 'created_at')->widget(DateControl::classname(), [
                'value' => $model->isNewRecord ? time() : $model->created_at,
            ]);
            ?>

            <?php
            echo $form->field($model, 'image')->widget(
                    FileAPI::className(), [
                'settings' => [
                    'url' => ['/content/news/upload-image']
                ]
                    ]
            )->label('Изображение');
            ?>


            <?= $form->field($model, 'is_enable')->checkbox() ?>

            <?= $form->field($model, 'ord')->textInput() ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
