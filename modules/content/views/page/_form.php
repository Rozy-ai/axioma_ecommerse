<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
?>

<div class="page-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-xs-8">
            <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

            <?=
            $form->field($model, 'content')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'imageUpload' => Url::to(['/content/content/upload-image']),
                    'imageManagerJson' => Url::to(['/content/content/images-get']),
//                    'imageUpload' => Url::to(['/site/image-upload']),
//                    'imageManagerJson' => Url::to(['/site/images-get']),
                    'minHeight' => 500,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'fontcolor',
                        'imagemanager',
                    ],
                    'replaceDivs' => false,
                    'deniedTags' => ['style']
                ]
            ]);
            ?>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'is_enable')->checkbox() ?>

            <?= $form->field($model, 'ord')->textInput() ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
