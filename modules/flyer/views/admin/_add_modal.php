<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use kartik\widgets\Select2;
use vova07\imperavi\Widget;

$model = new \app\modules\flyer\models\FlyerGoods;
?>

<?php
Modal::begin([
    'id' => 'add-product-modal',
    'header' => '<p class="h2 text-center">Добавить товар</p>',
    'toggleButton' => [
        'label' => 'Добавить товар', 'class' => 'btn btn-primary'
    ],
    'options' => [
        'tabindex' => false,
    ]
]);
?>

<?php $form = ActiveForm::begin(['id' => 'callback-form', 'enableClientValidation' => true,]); ?>
<div class="text-left">
    <?= $form->field($model, 'flyer_id')->hiddenInput(['value' => $flyer->id])->label(false) ?>
    <?=
    $form->field($model, 'product_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \app\modules\products\models\Product::__getHeaders(),
        'options' => [
            'placeholder' => 'Товар',
//            'multiple' => false,
        ],
    ]);
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
            'deniedTags' => ['style']
        ]
    ]);
    ?>
    <?= $form->field($model, 'price')->textInput() ?>
    <?= $form->field($model, 'order')->textInput(['type' => 'number']) ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'onClick' => "yaCounter23717086.reachGoal('callback-sent'); return true;"]) ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>