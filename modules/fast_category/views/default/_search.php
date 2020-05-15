<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use webtoolsnz\widgets\RadioButtonGroup;
use kartik\checkbox\CheckboxX;
//use kartik\form\ActiveForm;
use kartik\select2\Select2;

//'@app/modules/category/assets/css/category-search.css'

$this->registerCss($this->render('./../../assets/css/category-search.css'));
?>

<div class="category-search">

    <?php
    $form = ActiveForm::begin([
                'action' => Yii::$app->request->url,
                'method' => 'get',
                'id' => 'category-search',
    ]);
    ?>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="row">
                <div class="col-xs-6">

                    <?php if ($category->is_ar): ?>

                        <?=
                        $form->field($model, 'is_akust', [
                            'checkboxTemplate' => "<div class=\"checkbox checkbox-ext\">\n{beginLabel}\n{input}\n<span>{labelTitle}</span>\n{endLabel}\n{error}\n{hint}\n</div>",
                        ])->checkbox([
                            'onChange' => "",
                        ])->label('Акустомагнитные системы', ['class' => 'custom-checkbox'])
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

                        <?=
                        $form->field($model, 'is_radio', [
                            'checkboxTemplate' => "<div class=\"checkbox checkbox-ext\">\n{beginLabel}\n{input}\n<span>{labelTitle}</span>\n{endLabel}\n{error}\n{hint}\n</div>",
                        ])->checkbox([
                            'onChange' => "",
                        ])->label('Радоичастотные системы', ['class' => 'custom-checkbox'])
                        ?>

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
        <div class="col-xs-12 col-sm-6">

            <div class="row">
                <div class="col-xs-6">
                    <?php if ($category->id == 1): ?>
                        <?=
                        $form->field($model, 'enter_width')->widget(Select2::classname(), [
                            'data' => $model->collectEnterWidth($model->is_akust, $model->is_radio),
                            'options' => [
                                'onChange' => '$("#category-search").submit()',
                                'placeholder' => 'Ширина прохода', 'multiple' => false],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ])->label(false);
                        ?>

                    <?php endif; ?>
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
