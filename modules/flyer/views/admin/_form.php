<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\flyer\models\Flyer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flyer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
    <?php //echo $form->field($model, 'image')->dropDownList($model::$BANNER) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', $model->isNewRecord ? 'Next' : 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
