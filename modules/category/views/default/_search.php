<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use webtoolsnz\widgets\RadioButtonGroup;


//'@app/modules/category/assets/css/category-search.css'

$this->registerCss($this->render('./../../assets/css/category-search.css'))
?>

<div class="category-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['get'],
                'method' => 'get',
    ]);
    ?>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="row">
                <div class="col-xs-6">
                    <?= $form->field($model, 'is_akust')->checkbox() ?>
                </div>
                <div class="col-xs-6">
                    <?= $form->field($model, 'is_radio')->checkbox() ?>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-5">

            <div class="row">
                <div class="col-xs-6">
                    <?= $form->field($model, 'search')->dropDownList($model::_SEARCH)->label(false) ?>
                </div>
                <div class="col-xs-6">
                    <?= $form->field($model, 'page_size')->dropDownList($model::_SHOW)->label(false) ?>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-1">
            <?=
            $form->field($model, 'is_radio')->widget(RadioButtonGroup::class, [
                'items' => [
                    'list' => '<i class="fa fa-th-list" aria-hidden="true"></i>',
                    'grid' => '<i class="fa fa-th-large" aria-hidden="true"></i>',
                ]
            ])->label(false);
            ?>
        </div>
    </div>


    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'ord') ?>

    <?php // echo $form->field($model, 'seo_title') ?>

    <?php // echo $form->field($model, 'seo_description') ?>

    <?php // echo $form->field($model, 'seo_keywords') ?>

    <?php // echo $form->field($model, 'created_at')   ?>


    <?php ActiveForm::end(); ?>

</div>
