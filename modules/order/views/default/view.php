<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
// use yii\captcha\Captcha;

$this->title = 'Оформить заказ';
$this->params['breadcrumbs'][] = $this->title;
//print_r($model);
?>

<div class="order-view col-xs-12">
    <h1><?= $this->title ?></h1>

    <div class="row cart-index">
        <div class="col-xs-12 col-sm-9">

            <table class="table table-hover">
                <tr>
                    <th width="15%">Изображение</th>
                    <th>Наименование</th>
                    <th class="hidden-xs" width="15%">Количество</th>
                    <th class="hidden-xs">Цена за еденицу</th>
                    <th>Сумма</th>
                </tr>

                <?php
                $summ = 0;

                if ($model)
                    foreach ($model as $k => $item):
                        echo $this->render('_cart_item', ['model' => $item, 'count' => $counts[$k]]);
                        $summ += $item->price * $counts[$k];

                    endforeach;
                else
                    echo 'Корзина пуста';
                ?>

                <tr>
                    <th colspan="4"><p class="pull-right"><strong>Общая сумма:</strong></p></th>
                    <th><?= $summ ?></th>
                </tr>

            </table>

        </div>
        <div class="col-xs-12 col-sm-3 well">
            <div class="h3 text-center">ВАША КОРЗИНА</div>
            <?php $form = ActiveForm::begin(['id' => 'order-view-form']); ?>

            <?= $form->field($client, 'name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($client, 'email') ?>

            <?=
            $form->field($client, 'phone')->widget(MaskedInput::className(), [
                'mask' => '+7 (999) 999-9999',
                'options' => ['class' => 'form-control'],
            ])
            ?>


            <?=
            $form->field($client, 'personal_accept')->checkbox()->label('Я даю согласие на обработку персональных данных. '
                    . Html::a('Ознакомиться с условиями', ['/soglasie'], ['target' => '_blank'])
            )
            ?>
            
                <?php 
        //         echo $form->field($client, 'captcha')
        // ->hint('Нажмите на картинку, чтобы обновить')
        // ->widget(Captcha::className(), [
        //     'captchaAction'=> yii\helpers\Url::to('/captcha')
        // ]) 
        ?>

            <div class="form-group">
                <?= Html::submitButton('Оформить', ['class' => 'btn btn-lg btn-primary',
                    'onClick' => "ym(53040199, 'reachGoal', 'send-order'); return true;",
                    'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>