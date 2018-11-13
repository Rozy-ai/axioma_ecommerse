<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\products\models\Product */

$this->title = Yii::t('app', 'Update Product: ' . $model->header, [
            'nameAttribute' => '' . $model->header,
        ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
