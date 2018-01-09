<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use dosamigos\multiselect\MultiSelect;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\catalog\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-form">

    <?php
    $form = ActiveForm::begin([
                'enableAjaxValidation' => false,
                'enableClientValidation' => false,
    ]);
    ?>

    <div class="row">
        <div class="col-xs-8">

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
                    'imageManagerJson' => Url::to(['/site/images-get']),
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'fontcolor',
                        'imagemanager'
                    ]
                ]
            ]);
            ?>
            <?=
            $form->field($model, 'content2')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'imageManagerJson' => Url::to(['/site/images-get']),
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'fontcolor',
                        'imagemanager'
                    ]
                ]
            ]);
            ?>
        </div>
        <div class="col-xs-4">
            <?=
            $form->field($model, 'cat_main')->dropDownList(
                    app\modules\category\models\Category::getList())
            ?>

            <?=
            $form->field($model, 'cats')->widget(\kartik\select2\Select2::classname(), [
                'data' => app\modules\category\models\Category::getList(),
                'options' => ['placeholder' => 'Дополнительные категории', 'multiple' => true],
                'pluginOptions' => [
                    'tags' => true,
                    'tokenSeparators' => [',', ' '],
                    'maximumInputLength' => 10
                ],
            ]);
            ?>

            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

            <label>Изображение</label><br/>
            <?= !$model->image ? '' : Html::img($model->image, ['width' => '300']); ?>

            <?= $form->field($model, 'img_file')->fileInput(['accept' => 'image/*']) ?>

            <?= $form->field($model, 'price')->textInput() ?>

            <?= $form->field($model, 'price2')->textInput() ?>

            <?= $form->field($model, 'act')->checkbox() ?>

            <?= $form->field($model, 'ord')->textInput() ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
