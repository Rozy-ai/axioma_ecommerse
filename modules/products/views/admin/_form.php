<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use vova07\imperavi\Widget;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\products\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <div class="row">
        <?php
        $form = ActiveForm::begin([
                    'enableClientValidation' => false,
        ]);
        ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <div class="col-xs-8">

            <?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'price')->textInput() ?>

            <?= $form->field($model, 'anons')->textInput() ?>

            <?=
            $form->field($model, 'content_info')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'imageManagerJson' => Url::to(['/site/images-get']),
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'fontcolor',
                        'imagemanager',
                    ],
                    'replaceDivs' => false,
                    'deniedTags' => ['style']
                ]
            ]);
            ?>
            <?=
            $form->field($model, 'content_description')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'imageManagerJson' => Url::to(['/site/images-get']),
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'fontcolor',
                        'imagemanager',
                    ],
                    'replaceDivs' => false,
                    'deniedTags' => ['style']
                ]
            ]);
            ?>
            <?=
            $form->field($model, 'content_characteristics')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'imageManagerJson' => Url::to(['/site/images-get']),
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'fontcolor',
                        'imagemanager',
                    ],
                    'replaceDivs' => false,
                    'deniedTags' => ['style']
                ]
            ]);
            ?>
            <?=
            $form->field($model, 'content_install')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'imageUpload' => Url::to(['/products/admin/image-upload']),
                    'imageManagerJson' => Url::to(['/products/admin/images-get']),
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                        'fontcolor',
                        'imagemanager',
                    ],
                    'replaceDivs' => false,
                    'deniedTags' => ['style']
                ]
            ]);
            ?>

            <?=
            $form->field($model, 'supported_products')->widget(\kartik\select2\Select2::classname(), [
                'data' => app\modules\products\models\Product::__getHeaders(),
                'options' => ['placeholder' => 'Связанные товары', 'multiple' => true],
                'pluginOptions' => [
                    'tags' => true,
                    'tokenSeparators' => [',', ' '],
                    'maximumInputLength' => 10
                ],
            ]);
            ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

        </div>
        <div class="col-xs-4">

            <?=
            $form->field($model, 'category_id')->widget(\kartik\select2\Select2::classname(), [
                'data' => app\modules\category\models\Category::__getHeaders(),
                'options' => ['placeholder' => 'Категория', 'multiple' => false],
            ]);
            ?>

            <?=
            $form->field($model, 'cats')->widget(\kartik\select2\Select2::classname(), [
                'data' => app\modules\category\models\Category::__getHeaders(),
                'options' => ['placeholder' => 'Дополнительные категории', 'multiple' => true],
            ]);
            ?>

            <?=
            $form->field($model, 'fastcat_id')->widget(\kartik\select2\Select2::classname(), [
                'data' => app\modules\fast_category\models\FastCategory::__getHeaders(),
                'options' => ['placeholder' => 'Быстрые категории', 'multiple' => false],
            ]);
            ?>

            <?= $form->field($model, 'article')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'youtube_link')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'krat')->textInput() ?>

            <?= $form->field($model, 'ord')->textInput() ?>

            <?= $form->field($model, 'is_enable')->checkbox() ?>

            <?= $form->field($model, 'in_stock')->checkbox() ?>

            <?= $form->field($model, 'product_type')->checkbox() ?>

            <?= $form->field($model, 'show_in_recomended')->checkbox() ?>

            <?= $form->field($model, 'is_akustika')->checkbox() ?>

            <?= $form->field($model, 'is_radio')->checkbox() ?>

            <?= $form->field($model, 'is_ip')->checkbox() ?>

            <?= $form->field($model, 'is_tvi')->checkbox() ?>

            <?= $form->field($model, 'recomended_sort')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'enter_width')->textInput() ?>

            <?php ActiveForm::end(); ?>



            <h2>Изображения</h2>
            <div id="image-list" class="well row">
            </div>

            <?= app\modules\image\widgets\ImageUpload::widget() ?>
        </div>

    </div>


    <script type="text/javascript">
        var object_id = <?= $model->id ?>;
    </script>

</div>
