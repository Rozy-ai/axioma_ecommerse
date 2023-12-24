<?php

use yii\helpers\Html;
?>
<div class="col-sm-12 one-service">

<div class="service-wrap wrap-<?= $item->id ?>">
    <div class="img-wrap"><a href="<?= $item->img ?>"><img src="<?= $item->img ?>" alt="<?= $item->name ?>"></a></div>
    <p class="title"> &laquo; <?= $item->name ?> &raquo; </p>
    <p><strong><?= $item->employee_name ?></strong></p>
    <p class="title"> <?= $item->employee_job ?> </p>
    <br><br>
    <div class="content">
        <?= Html::tag('p', $item->content, ['class' => 'anons']) ?>
    </div>
</div>
</div>
<!-- 
<div class="row">

        <div class="col-xs-4 grid-item">

            <?php //echo Html::img($item->img, ['class' => 'img img-responsive img-thumbnail']) ?>
        </div>


</div> -->