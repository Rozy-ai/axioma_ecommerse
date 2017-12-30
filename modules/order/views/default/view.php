<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Оформить заказ';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="order-view col-xs-12">
    <h1>Оформить заказ</h1>

    <div class="row">
        <div class="col-xs-12 col-sm-8">

            <table class="table table-hover">
                <tr>
                    <th width="15%">Изображение</th>
                    <th>Наименование</th>
                    <th width="15%">Количество</th>
                    <th>Цена за еденицу</th>
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
        <div class="col-xs-12 col-sm-4 well">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($client, 'name')->textInput(['autofocus' => true]) ?>

            <?= $form->field($client, 'email') ?>

            <?= $form->field($client, 'phone') ?>

            <?=
            $form->field($client, 'personal_accept')->checkbox()->label('Я даю согласие на обратобку персональных данных. '
                    . Html::a('Ознакомиться с условиями', ['/soglasie'], ['target' => '_blank'])
            )
            ?>

            <div class="form-group">
                <?= Html::submitButton('Оформить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>