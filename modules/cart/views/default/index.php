<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use yii\captcha\Captcha;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="cart-index">
    <!--<h1>Корзина</h1>-->
    <div class="row">
        <div class="col-xs-12 col-sm-9">
            <div class="cart-index-wrap"></div>
        </div>

        <div class="col-xs-12 col-sm-3">
            
            <div class="h3">ВАША КОРЗИНА</div>

            <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => '/order/default/view']); ?>

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

            <?=
                    $form->field($client, 'captcha')
                    ->hint('Нажмите на картинку, чтобы обновить')
                    ->widget(Captcha::className(), [
                        'captchaAction' => yii\helpers\Url::to('/captcha')
                    ])
            ?>

            <div class="form-group">
                <?=
                Html::submitButton('Оформить', ['class' => 'btn btn-primary',
                    'onClick' => "ym(53040199, 'reachGoal', 'send-order'); return true;",
                    'name' => 'contact-button'])
                ?>
            </div>

            <?php ActiveForm::end(); ?>


        </div>
    </div>

</div>

<script type="text/javascript">

    var cart = true;

</script>