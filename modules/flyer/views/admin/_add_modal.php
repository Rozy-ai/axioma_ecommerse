<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use kartik\widgets\Select2;
use vova07\imperavi\Widget;
use vova07\fileapi\Widget as FileAPI;

$model = isset($model) ? $model : new \app\modules\flyer\models\FlyerGoods;
?>

<?php
Modal::begin([
    'id' => !isset($model->id) ? 'add-product-modal' : 'modal-' . $model->id,
    'header' => '<p class="h2 text-center">Добавить товар</p>',
    'toggleButton' => [
        'label' => !isset($model->id) ? 'Добавить товар' :
                '<span class="glyphicon glyphicon-pencil text-info"></span>', 'class' => 'btn btn-primary'
    ],
    'options' => [
        'tabindex' => false,
    ]
]);
?>

<?php $form = ActiveForm::begin(['id' => 'form-' . $model->id, 'enableClientValidation' => true,]); ?>
<div class="text-left">
    <?= $form->field($model, 'flyer_id')->hiddenInput(['value' => $flyer->id])->label(false) ?>
    <?=
    $form->field($model, 'name')->textInput()
//    $form->field($model, 'product_id')->widget(\kartik\select2\Select2::classname(), [
//        'data' => \app\modules\products\models\Product::__getHeaders(),
//        'options' => [
//            'placeholder' => 'Товар',
////            'multiple' => false,
//        ],
//    ]);
    ?>
    <?php
    echo $form->field($model, 'image')->widget(
            FileAPI::className(), [
        'settings' => [
            'url' => ['/flyer/admin/upload-image']
        ]
            ]
    )->label('Изображение');
    ?>
    <?=
    $form->field($model, 'custom_text')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 100,
            'plugins' => [
                'clips',
                'fullscreen',
                'fontcolor',
            ],
            'replaceDivs' => false,
            'linebreaks' => true,
            'deniedTags' => ['style']
        ]
    ]);
    ?>
    <?= $form->field($model, 'price')->textInput() ?>
    <?= $form->field($model, 'price_new')->textInput() ?>
    <?= $form->field($model, 'order')->textInput(['type' => 'number']) ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>