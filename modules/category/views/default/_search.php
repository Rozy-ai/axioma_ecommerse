<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use webtoolsnz\widgets\RadioButtonGroup;
use kartik\checkbox\CheckboxX;
use kartik\form\ActiveForm;

//'@app/modules/category/assets/css/category-search.css'

$this->registerCss($this->render('./../../assets/css/category-search.css'));
?>

<div class="category-search">

    <?php
    $form = ActiveForm::begin([
                'action' => Yii::$app->request->url,
                'method' => 'post',
                'id' => 'category-search',
    ]);
    ?>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="row">
                <div class="col-xs-6">
                    <?=
                    $form->field($model, 'is_akust')->widget(CheckboxX::classname(), [
                        'initInputType' => CheckboxX::INPUT_CHECKBOX,
                        'pluginOptions' => [
                            'threeState' => false,
//                            'size' => 'sm',
                        ],
                        'labelSettings' => [
                            'position' => CheckboxX::LABEL_LEFT
                        ],
                        'pluginEvents' => [
//                            'click' => '$("#category-search").submit()',
//                            "change" => "function() { GruzchikiCalc()}",
                        ],
                    ])->label(false)
                    ?>

                </div>
                <div class="col-xs-6">
                    <?=
                    $form->field($model, 'is_radio')->widget(CheckboxX::classname(), [
                        'initInputType' => CheckboxX::INPUT_CHECKBOX,
                        'pluginOptions' => [
                            'threeState' => false,
//                            'size' => 'sm',
                        ],
                        'labelSettings' => [
                            'position' => CheckboxX::LABEL_LEFT
                        ],
                        'pluginEvents' => [
//                            'click' => '$("#category-search").submit()',
//                            "change" => "function() { GruzchikiCalc()}",
                        ],
                    ])->label(false)
                    ?>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-6">

            <div class="row">
                <div class="col-xs-6">

                </div>
                <div class="col-xs-6">
                    <?=
                            $form->field($model, 'search')
                            ->dropDownList($model::_SEARCH,
                                    [
                                        'onChange' => '$("#category-search").submit()',
                            ])->label(false)
                    ?>
                    <?php
                    $form->field($model, 'page_size')
                            ->dropDownList($model::_SHOW, [
                                'onChange' => '$("#category-search").submit()',
                            ])->label(false)
                    ?>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-1 hidden">
            <?=
            $form->field($model, 'view')->widget(RadioButtonGroup::class, [
                'items' => [
                    'grid' => '<i class="fa fa-th-large" aria-hidden="true"></i>',
                    'list' => '<i class="fa fa-th-list" aria-hidden="true"></i>',
                ],
            ])->label(false);
            ?>
        </div>
    </div>


    <?php // echo $form->field($model, 'content')    ?>

    <?php // echo $form->field($model, 'image')    ?>

    <?php // echo $form->field($model, 'ord')    ?>

    <?php // echo $form->field($model, 'seo_title')    ?>

    <?php // echo $form->field($model, 'seo_description')    ?>

    <?php // echo $form->field($model, 'seo_keywords')     ?>

    <?php // echo $form->field($model, 'created_at')        ?>


    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs($this->render('./../../assets/js/category_filter.js'));
