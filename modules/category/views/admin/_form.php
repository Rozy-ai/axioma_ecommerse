<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <p><strong>ID: </strong><span><?= $model->id ?></span></p>

    <?=
    $form->field($model, 'parent_id')->dropDownList(
            app\modules\category\models\Category::getList())
    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uri')->textInput(['maxlength' => true]) ?>

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

    <label>Изображение</label><br/>
    <?= !$model->image ? '' : Html::img($model->image, ['width' => '300']); ?>

    <?= $form->field($model, 'img_file')->fileInput(['accept' => 'image/*']) ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'show')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
