<?php

use yii\helpers\Html;
?>
<tr>
    <td><?= $model->image ? Html::img('/'.$model->image, ['class' => 'img img-responsive']) : '' ?></td>
    <td><?= Html::a($model->name, ['/catalog/' . $model->url]) ?></td>
    <td><?= $count ?></td>
    <td><?= $model->price ?></td>
    <td><?= $model->price * $count ?></td>
</tr>