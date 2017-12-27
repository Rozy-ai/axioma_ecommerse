<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\shortcode\models\Shortcode */

$this->title = 'Create Shortcode';
$this->params['breadcrumbs'][] = ['label' => 'Shortcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shortcode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
