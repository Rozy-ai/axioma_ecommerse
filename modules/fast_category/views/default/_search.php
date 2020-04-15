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

                    <?php if ($category->is_ar): ?>

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

                    <?php endif; ?>

                    <?php if ($category->is_video): ?>

                        <?=
                        $form->field($model, 'is_ip')->widget(CheckboxX::classname(), [
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

                    <?php endif; ?>



                </div>
                <div class="col-xs-6">

                    <?php if ($category->is_ar): ?>

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

                    <?php endif; ?>

                    <?php if ($category->is_video): ?>

                        <?=
                        $form->field($model, 'is_tvi')->widget(CheckboxX::classname(), [
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

                    <?php endif; ?>


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
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-1 hidden">
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs($this->render('./../../assets/js/category_filter.js'));
