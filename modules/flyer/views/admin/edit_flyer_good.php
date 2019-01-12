<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use vova07\imperavi\Widget;
use vova07\fileapi\Widget as FileAPI;

$this->title = Yii::t('app', 'Flyers');
$this->params['breadcrumbs'][] = ['label' => 'Листовка', 'url' => ['view', 'id' => $model->flyer_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['id' => 'form-' . $model->id, 'enableClientValidation' => true,]); ?>
<div class="text-left">
    <?= $form->field($model, 'flyer_id')->hiddenInput(['value' => $model->id])->label(false) ?>
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
    )->label('Изображение в шапке');
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
    <?= $form->field($model, 'price_new')->textInput() ?>
<?= $form->field($model, 'order')->textInput(['type' => 'number']) ?>
</div>
<div class="form-group">
<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
</div>

<?php
ActiveForm::end();
