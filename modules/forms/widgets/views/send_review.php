<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

$this->registerJsFile('@web/js/form/send_review.js', ['depends' => ['app\assets\AppAsset']]);
?>

<?php
Modal::begin([
    'id' => 'send-review-form-modal',
    'header' => '<p class="h2">Отправить отзыв о товаре</p>',
    'toggleButton' => ['label' => 'Оставить отзыв', 'class' => 'btn btn-default'],
]);
?>

<?php
$form = ActiveForm::begin(['id' => 'send-review-form',
            'enableClientValidation' => true,
        ]);
?>

<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'email')->textInput() ?>
<?= $form->field($model, 'review')->textarea() ?>
<?=
$form->field($model, 'personal_accept')->checkbox()->label('Я даю согласие на обработку персональных данных. '
        . Html::a('Ознакомиться с условиями', ['/soglasie'], ['target' => '_blank'])
)
?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php
ActiveForm::end();

Modal::end();
?>



