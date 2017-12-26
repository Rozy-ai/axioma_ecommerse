<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Опции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">

        <?php $form = ActiveForm::begin(); ?>
        <?php foreach ($model as $item): ?>

            <div class="col-xs-3">
                <?= $item->label ?>
            </div>

            <div class="col-xs-9">
                <?= $form->field($item, "text[$item->id]")->textarea(['rows' => 3, 'value' => $item->text])->label('') ?>
            </div>


        <?php endforeach; ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
