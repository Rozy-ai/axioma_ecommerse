<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\info\models\Info */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Инфо Блоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить?',
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
            'label',
            'name',
            'value:ntext',
        ],
    ])
    ?>

</div>
