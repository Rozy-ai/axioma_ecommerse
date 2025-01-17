<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use vova07\imperavi\Widget;
use vova07\fileapi\Widget as FileAPI;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <div class="row">
        <?php
        $form = ActiveForm::begin(
                        [
                            'enableClientValidation' => false,
        ]);
        ?>
        <div class="col-xs-8">
            <?=
            $form->field($model, 'parent_id')->widget(\kartik\select2\Select2::classname(), [
                'data' => app\modules\category\models\Category::getList(),
                'options' => ['placeholder' => 'Категория', 'multiple' => false],
            ]);
            ?>

            <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

            <?=
            $form->field($model, 'preview')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'imageManagerJson' => Url::to(['/site/images-get']),
                    'minHeight' => 100,
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
            <?=
            $form->field($model, 'content')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'imageManagerJson' => Url::to(['/site/images-get']),
                    'minHeight' => 200,
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

            <?php
            echo $form->field($model, 'ico')->widget(
                    FileAPI::className(), [
                'settings' => [
                    'url' => ['/category/admin/upload-image']
                ]
                    ]
            )->label('Иконкa');
            ?>

            <?php
            echo $form->field($model, 'image')->widget(
                    FileAPI::className(), [
                'settings' => [
                    'url' => ['/category/admin/upload-image']
                ]
                    ]
            )->label('Изображение');
            ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="col-xs-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ord')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'is_enable')->checkbox() ?>
            <?= $form->field($model, 'show_in_home')->checkbox() ?>
            <?= $form->field($model, 'in_home_order')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'in_menu')->checkbox() ?>
            <?= $form->field($model, 'in_menu_order')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
