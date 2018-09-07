<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$title = 'Новости';

$this->params['breadcrumbs'][] = $title;
?>

<h1><?= $title ?></h1>

<div class="news">

    <?php
    echo ($models) ? '' : 'Пока новостей нет';

// подключаем виджет постраничной разбивки
// проходим цикл по данным модели
    foreach ($models as $model) {
        // выводим название организации (пример)
        echo $this->render('_one_news', ['model' => $model]);
    }

// отображаем постраничную разбивку
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>

</div>