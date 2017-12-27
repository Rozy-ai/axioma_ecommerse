<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
//use kartik\widgets\DateTimePicker;
use vova07\imperavi\Widget;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\news\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<?php //print_r($model->errors) ?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="form-group col-xs-12 text-right">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <div class="col-xs-12 col-md-8">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'anons')->textarea(['rows' => 6]) ?>
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
            <?=
            $form->field($model, 'content2')->widget(Widget::className(), [
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
            $form->field($model, 'news_date')->widget(DateTimePicker::classname(), [
                'options' => ['placeholder' => 'Enter event time ...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]);
            ?>

            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'ord')->textInput(['type' => 'number']) ?>
            <?= $form->field($model, 'act')->dropDownList($model::$_act) ?>

        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
