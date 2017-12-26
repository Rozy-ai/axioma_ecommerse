<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\catalog\models\SearchCatalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'h1') ?>

    <?php // echo $form->field($model, 'anons') ?>

    <?php // echo $form->field($model, 'news_date') ?>

    <?php // echo $form->field($model, 'news_type') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'content2') ?>

    <?php // echo $form->field($model, 'act') ?>

    <?php // echo $form->field($model, 'ord') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'priority') ?>

    <?php // echo $form->field($model, 'visit_counter') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'price2') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
