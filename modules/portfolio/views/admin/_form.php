<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\modules\portfolio\models\Portfolio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-form">

    <div class="row">
        <div class="col-xs-7">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?=
            $form->field($model, 'anons')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 100,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'fontcolor',
                    ]
                    , 'replaceDivs' => false,
                ]
            ]);
            ?>

            <?=
            $form->field($model, 'text')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'fontcolor',
                    ]
                    , 'replaceDivs' => false,
                ]
            ]);
            ?>

            <?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
            

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
        <div class="col-xs-5">
            <h2>Изображения</h2>
            <div id="image-list" class="well row">

            </div>

            <?= app\modules\portfolio\widgets\ImageUpload::widget(['source_id' => $model->id]) ?>
        </div>
    </div>
    <script type="text/javascript">
        var object_id = <?= $model->id ?>;
    </script>
</div>
