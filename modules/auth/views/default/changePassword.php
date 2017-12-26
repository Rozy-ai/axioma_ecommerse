<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'CHANGEPASSWORD_TITLE');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-changePassword">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?=Yii::t('app', 'CHANGEPASSWORD_ALL_FIELD')?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'changePassword-form']); ?>

            <?= $form->field($model, 'oldPassword')->passwordInput() ?>

            <?= $form->field($model, 'newPassword')->passwordInput() ?>

            <?= $form->field($model, 'confirmPassword')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'CHANGEPASSWORD_SEND'), ['class' => 'btn btn-primary', 'name' => 'changePassword-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
