<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход на сайт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Введите имя пользователя и пароль:</p>

            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-md-9\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-md-3 control-label'],
                        ],
            ]);
            ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?=
            $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"col-md-offset-1 col-md-9\">{input} Запомнить меня</div>\n<div class=\"col-md-8\">{error}</div>",
            ])
            ?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
