<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\modules\news\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="form-group col-xs-12 text-right">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <div class="col-xs-12 col-md-8">

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'preview')->textarea(['rows' => 6]) ?>
            <?=
            $form->field($model, 'content')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'imageUpload' => Url::to(['/news/admin/image-upload']),
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'fontcolor'
                    ]
                ]
            ]);
            ?>

        </div>
        <div class="col-xs-12 col-md-4">
            <?=
            $form->field($model, 'publish_at')->widget(DateControl::classname(), [
                'value' => $model->isNewRecord ? time() : $model->publish_at,
            ]);
            ?>

            <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'seo_description')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'is_enable')->dropDownList($model::$_is_enable) ?>

        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
