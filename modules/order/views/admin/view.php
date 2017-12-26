<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\order\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'client_name',
            'email:email',
            'phone',
            'created_at',
        ],
    ])
    ?>

    <?php if ($model->items)  ?>

    <p class="h3">Список товаров</p>

    <table class="table table-striped">

        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Сумма</th>
        </tr>

        <?php
        $allSum = 0;
        foreach ($model->items as $item):
            ?>

            <tr>
                <td><?= $item->good_id ?></td>
                <td><?= $item->name ?></td>
                <td><?= $item->count ?></td>
                <td><?= $item->price ?></td>
                <td><?php
                    echo $sum = $item->count * $item->price;
                    $allSum += $sum;
                    ?></td>
            </tr>
            <?php
        endforeach;
        ?>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Итого: <?= $allSum ?></th>
        </tr>


    </table>


</div>
