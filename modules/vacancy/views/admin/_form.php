<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\modules\vacancy\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'description')->widget(Widget::className(), [
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

    <?= $form->field($model, 'pay')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'city_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => app\modules\city\models\City::getActiveCity(),
        'options' => ['placeholder' => 'Город', 'multiple' => false],
    ]);
    ?>

    <?= $form->field($model, 'is_close')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
