<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use webtoolsnz\widgets\RadioButtonGroup;
use kartik\checkbox\CheckboxX;
//use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;

//'@app/modules/category/assets/css/category-search.css'

$this->registerCss($this->render('./../../assets/css/category-search.css'));
?>

<div class="category-search">

    <?php
    $form = ActiveForm::begin([
//                'action' => Yii::$app->request->url,
                'method' => 'post',
                'id' => 'category-search',
    ]);
    ?>

    <div class="row">
        <div class="col-xs-12 col-lg-6">
            <div class="row">
                <div class="col-xs-12">

                    <?php if ($category->is_ar): ?>



                        <?php
                        echo $form->field($model, 'detection_type', [
                                    'inline' => true,
//                            'inlineRadioListTemplate' => "<div class=\"checkbox checkbox-ext\">\n{beginLabel}\n{input}\n<span>{labelTitle}</span>\n{endLabel}\n{error}\n{hint}\n</div>",
//                                    'inlineRadioListTemplate' => '{beginWrapper} {input}  <span class="label-text"> {label} </span> {endWrapper} {hint}',
//                                    'inlineRadioListTemplate' => '{beginWrapper} {input}  <span class="label-text"> {label} </span> {endWrapper} {hint}',
//                                    'radioTemplate' => '<div class=\"radio\">{beginLabel}{input} <span class="label-text"> {labelTitle} </span> {endLabel}{hint}</div>',
                                ])->radioList(
                                        [0 => 'Любая', 1 => 'Акустомагнитные системы', 2 => 'Радиочастотные системы'],
                                        [
                                            'item' => function($index, $label, $name, $checked, $value) {


                                                $return = '<label>';
                                                $return .= '<input id="radio-' . $index . '" type="radio" name="' . $name . '" ' . ($checked ? 'checked' : '') . ' value="' . $value . '"/>'
                                                        . '<span class = "label-text">' . ucwords($label) . '</span>';
                                                $return .= '</label >';
//                                $return = '<input id="radio-' . $index . '" type="radio" name="' . $name . '" value="' . $value . '"/>';
//                        $return .= '<label for="radio-' . $index . '" class="modal-radio">' . ucwords($label) . '</label>';

                                                return $return;
                                            },
                                            'onChange' => '$("#category-search").submit()']
                                )
                        ?>

                        <?php
//                            echo $form->field($model, 'detection_type')
//                                    ->radioButtonGroup(
//                                            [0 => 'Любая', 1 => 'Акустомагнитные системы', 2 => 'Радиочастотные системы'],
//                                            ['class' => 'btn-group-sm btn-outline-secondary',]
//                            );
//                        echo $form->field($model, 'detection_type')->radioList(
//                                [0 => 'Любая', 1 => 'Акустомагнитные системы', 2 => 'Радиочастотные системы'],
//                                ['custom' => true,]
//                        );
//                        echo $form->field($model, 'detection_type')->widget(RadioButtonGroup::className(),
//                                [
//                                    'items' => [0 => 'Любая', 1 => 'Акустомагнитные системы', 2 => 'Радиочастотные системы'],
//                                    'itemOptions' => [
//                                        'buttons' => [
//                                            0 => [
//                                                'activeState' => 'btn active btn-all',
//                                                'onSelect' => new JsExpression('function (e) {$("#category-search").submit()}'),
//                                            ],
//                                            1 => [
//                                                'activeState' => 'btn btn-akust',
//                                                'onSelect' => new JsExpression('function (e) {$("#category-search").submit()}'),
//                                            ],
//                                            2 => [
//                                                'activeState' => 'btn btn-radio',
//                                                'onSelect' => new JsExpression('function (e) {$("#category-search").submit()}'),
//                                            ],
//                                        ],
//                                    ],
////                                    'options' => ['onClick' => '$("#category-search").submit()',]
//                        ]);
                        ?>


                    <?php endif; ?>

                    <?php if ($category->is_video): ?>

                        <?=
                        $form->field($model, 'is_ip', [
                            'checkboxTemplate' => "<div class=\"checkbox checkbox-ext\">\n{beginLabel}\n{input}\n<span>{labelTitle}</span>\n{endLabel}\n{error}\n{hint}\n</div>",
                        ])->checkbox([
                            'onChange' => "",
                        ])->label('IP', ['class' => 'custom-checkbox'])
                        ?>

                    <?php endif; ?>



                </div>
                <div class="col-xs-6">

                    <?php if ($category->is_ar): ?>


                    <?php endif; ?>

                    <?php if ($category->is_video): ?>

                        <?=
                        $form->field($model, 'is_tvi', [
                            'checkboxTemplate' => "<div class=\"checkbox checkbox-ext\">\n{beginLabel}\n{input}\n<span>{labelTitle}</span>\n{endLabel}\n{error}\n{hint}\n</div>",
                        ])->checkbox([
                            'onChange' => "",
                        ])->label('HD-TVI', ['class' => 'custom-checkbox'])
                        ?>


                    <?php endif; ?>


                </div>
            </div>

        </div>
        <div class="col-xs-12 col-lg-6">

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?php if ($category->id == 1): ?>
                        <?=
                        $form->field($model, 'enter_width')->widget(Select2::classname(), [
                            'data' => $model->collectEnterWidth($model->detection_type),
                            'options' => [
                                'onChange' => '$("#category-search").submit()',
                                'placeholder' => 'Ширина прохода', 'multiple' => false],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ])->label('Ширина входной группы');
                        ?>

                    <?php endif; ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?=
                            $form->field($model, 'search')
                            ->widget(Select2::classname(), [
                                'data' => $model::_SEARCH,
                                'options' => [
                                    'onChange' => '$("#category-search").submit()',
                                    'multiple' => false],
                            ])->label('Сортировка')
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
