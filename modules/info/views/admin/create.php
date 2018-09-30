<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\info\models\Info */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Инфо Блоки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
