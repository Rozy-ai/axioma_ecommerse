<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$title = 'Статьи';

$this->params['breadcrumbs'][] = $title;
?>

<h1><?= $title ?></h1>

<div class="stati">

    <?php
    echo ($models) ? '' : 'Пока статей нет';

// подключаем виджет постраничной разбивки
// проходим цикл по данным модели
    foreach ($models as $model) {
        // выводим название организации (пример)
        echo $this->render('_one', ['model' => $model]);
    }

// отображаем постраничную разбивку
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>

</div>