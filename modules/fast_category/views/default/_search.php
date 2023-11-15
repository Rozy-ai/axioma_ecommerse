<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use webtoolsnz\widgets\RadioButtonGroup;
use kartik\checkbox\CheckboxX;
//use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;

//'@app/modules/category/assets/css/category-search.css'

$this->registerCss($this->render('./../../assets/css/category-search.css'));
?>

<?php
$form = ActiveForm::begin([
    //            'action' => '/fast-cat/online-kass',
    'action' => Url::to(Yii::$app->request->pathInfo, true),
    'method' => 'post',
    'id' => 'category-search',
]);
?>

<?php if ($category->url == 'online-kass') : ?>



    <div class="category-search">

        <div class="row">
            <div class="col-xs-12">

                <?php // foreach ($model::ONLINE_KASS_TYPE as $item): 
                ?>

                <!--                    <div class="pretty p-default p-curve p-thick">
                                        <input type="checkbox" name="online_kass_type" 
                                               'onChange' = '$("#category-search").submit()'
                                               />
                                        <div class="state">
                                            <label>Thick curve</label>
                                        </div>
                                    </div>-->

                <?php //endforeach; 
                ?>

                <?php
                echo $form->field($model, 'online_kass_type', [
                    //                    'inline' => true,
                    //                            'inlineRadioListTemplate' => "<div class=\"checkbox checkbox-ext\">\n{beginLabel}\n{input}\n<span>{labelTitle}</span>\n{endLabel}\n{error}\n{hint}\n</div>",
                    //                                    'inlineRadioListTemplate' => '{beginWrapper} {input}  <span class="label-text"> {label} </span> {endWrapper} {hint}',
                    //                                    'inlineRadioListTemplate' => '{beginWrapper} {input}  <span class="label-text"> {label} </span> {endWrapper} {hint}',
                    //                                    'radioTemplate' => '<div class=\"radio\">{beginLabel}{input} <span class="label-text"> {labelTitle} </span> {endLabel}{hint}</div>',
                ])
                    ->inline(true)
                    ->checkboxList(
                        $model::ONLINE_KASS_TYPE,
                        [
                            'item' => function ($index, $label, $name, $checked, $value) {


                                $return = '<div class="pretty p-default p-curve p-thick">';
                                $return .= '<input type="checkbox" name="' . $name . '"  name="' . $name . '" ' . ($checked ? 'checked' : '') . ' value="' . $value . '" />';
                                //                                        $return .= ' onChange = $("#category-search").submit()  ';
                                $return .= '<div class="state">';
                                $return .= '<label>' . $label . '</label>';
                                $return .= '</div>';
                                $return .= '</div>';
                                return $return;
                            },
                            'onChange' => '$("#category-search").submit()'
                        ]
                    )->label(false)
                ?>

            </div>
        </div>

    </div>

<?php else : ?>


    <div class="category-search">



        <div class="row">





            <div class="col-xs-12 col-lg-9">



                <?php if (!$category->is_video) : ?>



                    <?php
                    $labels = [1 => 'Акустомагнитная', 2 => 'Радиочастотная'];

                    if ($category->url == 'datchiki')
                        $labels = [1 => 'Акустомагнитная', 2 => 'Радиочастотная'];

                    if ($category->url == 'etiketki')
                        $labels = [1 => 'Акустомагнитная', 2 => 'Радиочастотная'];

                    //                     echo $form->field($model, 'detection_type', [
                    //                         'inline' => true,
                    // //                            'inlineRadioListTemplate' => "<div class=\"checkbox checkbox-ext\">\n{beginLabel}\n{input}\n<span>{labelTitle}</span>\n{endLabel}\n{error}\n{hint}\n</div>",
                    // //                                    'inlineRadioListTemplate' => '{beginWrapper} {input}  <span class="label-text"> {label} </span> {endWrapper} {hint}',
                    // //                                    'inlineRadioListTemplate' => '{beginWrapper} {input}  <span class="label-text"> {label} </span> {endWrapper} {hint}',
                    // //                                    'radioTemplate' => '<div class=\"radio\">{beginLabel}{input} <span class="label-text"> {labelTitle} </span> {endLabel}{hint}</div>',
                    //                     ])->radioList(
                    //                             $labels,
                    //                             [
                    //                                 'item' => function ($index, $label, $name, $checked, $value) {


                    //                                     $return = '<label>';
                    //                                     $return .= '<input id="radio-' . $index . '" type="radio" name="' . $name . '" ' . ($checked ? 'checked' : '') . ' value="' . $value . '"/>'
                    //                                             . '<span class = "label-text">' . ucwords($label) . '</span>';
                    //                                     $return .= '</label >';
                    // //                                $return = '<input id="radio-' . $index . '" type="radio" name="' . $name . '" value="' . $value . '"/>';
                    // //                        $return .= '<label for="radio-' . $index . '" class="modal-radio">' . ucwords($label) . '</label>';

                    //                                     return $return;
                    //                                 },
                    //                                 'onChange' => '$("#category-search").submit()']
                    //                     )
                    ?>

                    <!-- kruglezki -->
                    <?php
                    echo $form->field($model, 'detection_type', [
                        'inline' => true,
                    ])->radioList(
                        $labels,
                        [
                            'item' => function ($index, $label, $name, $checked, $value) {


                                $return = '<label>';
                                $return .= '<input id="radio-' . $index . '" type="radio" name="' . $name . '" ' . ($checked ? 'checked' : '') . ' value="' . $value . '"/>'
                                    . '<span class = "label-text">' . ucwords($label) . '</span>';
                                $return .= '</label >';
                                //                                $return = '<input id="radio-' . $index . '" type="radio" name="' . $name . '" value="' . $value . '"/>';
                                //                        $return .= '<label for="radio-' . $index . '" class="modal-radio">' . ucwords($label) . '</label>';

                                return $return;
                            },
                            'onChange' => '$("#category-search").submit()'
                        ]
                    )
                    ?>

                    <!-- kruglezki end -->
                    <?php
                    // echo $form->field($model, 'detection_type')->widget(Select2::classname(), [
                    //     'data' => $labels,
                    //     'options' => [
                    //         'onChange' => '$("#category-search").submit()',
                    //         'placeholder' => 'Тип детекции', 'multiple' => false
                    //     ],
                    //     'pluginOptions' => [
                    //         'allowClear' => true,
                    //     ],
                    // ])->label(false);
                    ?>
                <?php endif; ?>

                <?php if ($category->is_video) : ?>

                    <?php
                    echo $form->field($model, 'video_type', [
                        'inline' => true,
                        //                            'inlineRadioListTemplate' => "<div class=\"checkbox checkbox-ext\">\n{beginLabel}\n{input}\n<span>{labelTitle}</span>\n{endLabel}\n{error}\n{hint}\n</div>",
                        //                                    'inlineRadioListTemplate' => '{beginWrapper} {input}  <span class="label-text"> {label} </span> {endWrapper} {hint}',
                        //                                    'inlineRadioListTemplate' => '{beginWrapper} {input}  <span class="label-text"> {label} </span> {endWrapper} {hint}',
                        //                                    'radioTemplate' => '<div class=\"radio\">{beginLabel}{input} <span class="label-text"> {labelTitle} </span> {endLabel}{hint}</div>',
                    ])->radioList(
                        [0 => 'Любая', 1 => 'IP', 2 => 'HD-TVI'],
                        [
                            'item' => function ($index, $label, $name, $checked, $value) {


                                $return = '<label>';
                                $return .= '<input id="radio-' . $index . '" type="radio" name="' . $name . '" ' . ($checked ? 'checked' : '') . ' value="' . $value . '"/>'
                                    . '<span class = "label-text">' . ucwords($label) . '</span>';
                                $return .= '</label >';
                                //                                $return = '<input id="radio-' . $index . '" type="radio" name="' . $name . '" value="' . $value . '"/>';
                                //                        $return .= '<label for="radio-' . $index . '" class="modal-radio">' . ucwords($label) . '</label>';

                                return $return;
                            },
                            'onChange' => '$("#category-search").submit()'
                        ]
                    )
                    ?>


                <?php endif; ?>

            </div>
            <!-- <div class="col-xs-12 col-lg-4"> -->

                <?php if ($category->id == 1) : ?>
                    <?php
                    // echo $form->field($model, 'enter_width', [
                    //     'inline' => true,
                    // ])->radioList(
                    //     $model->collectEnterWidth($model->detection_type),
                    //     [
                    //         'item' => function ($index, $label, $name, $checked, $value) {


                    //             $return = '<label>';
                    //             $return .= '<input id="radio-' . $index . '" type="radio" name="' . $name . '" ' . ($checked ? 'checked' : '') . ' value="' . $value . '"/>'
                    //                 . '<span class = "label-text">' . ucwords($label) . '</span>';
                    //             $return .= '</label >';
                    //             //                                $return = '<input id="radio-' . $index . '" type="radio" name="' . $name . '" value="' . $value . '"/>';
                    //             //                        $return .= '<label for="radio-' . $index . '" class="modal-radio">' . ucwords($label) . '</label>';

                    //             return $return;
                    //         },
                    //         'onChange' => '$("#category-search").submit()'
                    //     ]
                    // )
                    ?>

                    <?php 
                    // echo $form->field($model, 'enter_width')->widget(Select2::classname(), [
                    //     'data' => $model->collectEnterWidth($model->detection_type),
                    //     'options' => [
                    //         'onChange' => '$("#category-search").submit()',
                    //         'placeholder' => 'Ширина входной группы', 'multiple' => false
                    //     ],
                    //     'pluginOptions' => [
                    //         'allowClear' => true,
                    //     ],
                    // ])->label(false);
                    ?>

                <?php endif; ?>
            <!-- </div> -->
            <!-- <div class="col-xs-12 col-lg-2"> -->


<?php if ($category->id == 1) : ?>
    <?php 
       //  $labels = [0 => 'Любая', 1 => 'Доступно под заказ', 2 => 'Наличие'];
        ?>
                            <?php
                    // echo $form->field($model, 'in_stock', [
                    //     'inline' => true,
                    // ])->radioList(
                    //     $labels,
                    //     [
                    //         'item' => function ($index, $label, $name, $checked, $value) {


                    //             $return = '<label>';
                    //             $return .= '<input id="radio-' . $index . '" type="radio" name="' . $name . '" ' . ($checked ? 'checked' : '') . ' value="' . $value . '"/>'
                    //                 . '<span class = "label-text">' . ucwords($label) . '</span>';
                    //             $return .= '</label >';
                    //             //                                $return = '<input id="radio-' . $index . '" type="radio" name="' . $name . '" value="' . $value . '"/>';
                    //             //                        $return .= '<label for="radio-' . $index . '" class="modal-radio">' . ucwords($label) . '</label>';

                    //             return $return;
                    //         },
                    //         'onChange' => '$("#category-search").submit()'
                    //     ]
                    // )
                    ?>
    <?php 
    // echo $form->field($model, 'in_stock')->widget(Select2::classname(), [
    //                     'data' => $labels,
    //                     'options' => [
    //                         'onChange' => '$("#category-search").submit()',
    //                         'placeholder' => 'Наличие', 'multiple' => false
    //                     ],
    //                     'pluginOptions' => [
    //                         'allowClear' => true,
    //                     ],
    //                 ])->label(false);
    ?>

<?php endif; ?>
<!-- </div> -->
            <div class="col-xs-12 col-lg-3 text-right">
                <a href="#" onclick="changeGrid()"><?= Html::img('/image/ico/Подробный список.svg', ['class' => 'list-img']) ?></a>
                <a href="#" onclick="changeList()"><?= Html::img('/image/ico/Краткий список.svg', ['class' => 'list-img']) ?></a>
            </div>
        </div>



    </div>

<?php endif; ?>

<?php ActiveForm::end(); ?>

<?php
$this->registerJs($this->render('./../../assets/js/category_filter.js'));
