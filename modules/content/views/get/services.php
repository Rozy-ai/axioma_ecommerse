<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="uslugi">

    <h1><?= $model->header ?></h1>

    <?php foreach (array_chunk($pages, 2) as $_pages): ?>
        <div class="row">
            <?php
            foreach ($_pages as $page)
                echo $this->render('_one_service', ['model' => $page])
                ?>
        </div>
    <?php endforeach; ?>



</div>