<?php

use yii\helpers\Html;
?>


<div class="col-xs-12 h3">
    <?= Html::a($model->title, ['/category/' . $model->uri] , ['class' => 'label label-info ']) ?>
</div>