<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\vacancy\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

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
