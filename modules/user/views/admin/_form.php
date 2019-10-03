<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Сменить пароль');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-changePassword">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Yii::t('app', 'Сменить пароль') ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'changePassword-form']); ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'password_repeat')->passwordInput() ?>


            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'changePassword-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
